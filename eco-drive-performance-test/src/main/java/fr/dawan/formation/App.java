package fr.dawan.formation;

import com.mongodb.client.*;
import com.mongodb.client.model.Indexes;
import lombok.extern.slf4j.Slf4j;
import org.bson.Document;
import org.bson.json.JsonWriterSettings;
import org.bson.types.ObjectId;

import java.time.Instant;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.Date;

import static com.mongodb.client.model.Filters.and;
import static com.mongodb.client.model.Filters.eq;

@Slf4j
public class App 
{
    public static void main(String[] args) {
        try (MongoClient mongoClient = MongoClients.create("mongodb://localhost:27018")) { // update 27017
            MongoDatabase db = mongoClient.getDatabase("eco-drive");
            MongoCollection<Document> collection = db.getCollection("telemetry_history");

            long start = System.currentTimeMillis();
            FindIterable<Document> results = collection.find(and(eq("timestamp", Date.from(Instant.parse("1991-08-25T12:16:54.635Z"))), eq("vehicle_id", new ObjectId("699825ccfe2d1326e993d148"))));
            results.first();
            long end = System.currentTimeMillis();
            log.info("Temps sans index : {}ms", end - start);

            Document executionStats = (Document) results.explain().get("executionStats");
            log.info(String.valueOf(executionStats.toJson(JsonWriterSettings.builder().indent(true).build())));

            // On peut remarquer qu'il a en stage "COLLSCAN" et qu'il parcours toutes les télémétries avant de trouver
            // Cela confirme qu'on peut optimiser via un index

            collection.createIndex(Indexes.ascending("vehicle_id"));
            collection.createIndex(Indexes.descending("timestamp"));

            start = System.currentTimeMillis();
            results = collection.find(and(eq("timestamp", Date.from(Instant.parse("1991-08-25T12:16:54.635Z"))), eq("vehicle_id", new ObjectId("699825ccfe2d1326e993d148"))));
            results.first();
            end = System.currentTimeMillis();
            log.info("Temps avec index : {}ms", end - start);
        }
        catch (Exception e) {
            log.error("Erreur de connexion : {}", e.getMessage());
        }
    }
}
