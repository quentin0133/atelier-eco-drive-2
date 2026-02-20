package fr.dawan.formation.repositories;

import fr.dawan.formation.models.Telemetry;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

import java.util.List;

@RepositoryRestResource(collectionResourceRel = "telemetry_history", path = "telemetry_history")
public interface TelemetryHistoryRepository extends MongoRepository<Telemetry, String> {
    List<Telemetry> findByStatus(String status);
}
