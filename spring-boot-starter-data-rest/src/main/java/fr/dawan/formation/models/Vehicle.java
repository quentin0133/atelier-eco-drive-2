package fr.dawan.formation.models;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;
import org.springframework.data.mongodb.core.mapping.Field;

import java.util.ArrayList;
import java.util.List;

@Document(collection = "vehicles")
public class Vehicle {
    @Id
    private String id;
    private String brand;
    private String status;
    private Model model;
    private String registration;
    @Field("incident_histories")
    private List<Incident> incidentHistories = new ArrayList<>();

    public Vehicle() {
    }

    public Vehicle(String id, String brand, String status, Model model, String registration, List<Incident> incidentHistories) {
        this.id = id;
        this.brand = brand;
        this.status = status;
        this.model = model;
        this.registration = registration;
        this.incidentHistories = incidentHistories;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getBrand() {
        return brand;
    }

    public void setBrand(String brand) {
        this.brand = brand;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Model getModel() {
        return model;
    }

    public void setModel(Model model) {
        this.model = model;
    }

    public String getRegistration() {
        return registration;
    }

    public void setRegistration(String registration) {
        this.registration = registration;
    }

    public List<Incident> getIncidentHistories() {
        return incidentHistories;
    }

    public void setIncidentHistories(List<Incident> incidentHistories) {
        this.incidentHistories = incidentHistories;
    }

    @Override
    public String toString() {
        return "Vehicle{" +
            "id=" + id +
            ", brand='" + brand + '\'' +
            ", status='" + status + '\'' +
            ", model=" + model +
            ", registration='" + registration + '\'' +
            ", incidentHistories=" + incidentHistories +
            '}';
    }
}
