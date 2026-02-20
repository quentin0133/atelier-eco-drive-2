package fr.dawan.formation.models;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;
import org.springframework.data.mongodb.core.mapping.DocumentReference;

@Document(collection = "telemetry_history")
public class Telemetry {
    @Id
    private String id;
    private double latitude;
    private double longitude;
    private float batteryLevel;
    @DocumentReference
    private Vehicle vehicle;

    public Telemetry() {
    }

    public Telemetry(String id, double latitude, double longitude, float batteryLevel, Vehicle vehicle) {
        this.id = id;
        this.latitude = latitude;
        this.longitude = longitude;
        this.batteryLevel = batteryLevel;
        this.vehicle = vehicle;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public double getLatitude() {
        return latitude;
    }

    public void setLatitude(double latitude) {
        this.latitude = latitude;
    }

    public double getLongitude() {
        return longitude;
    }

    public void setLongitude(double longitude) {
        this.longitude = longitude;
    }

    public float getBatteryLevel() {
        return batteryLevel;
    }

    public void setBatteryLevel(float batteryLevel) {
        this.batteryLevel = batteryLevel;
    }

    public Vehicle getVehicle() {
        return vehicle;
    }

    public void setVehicle(Vehicle vehicle) {
        this.vehicle = vehicle;
    }

    @Override
    public String toString() {
        return "Telemetry{" +
            "id=" + id +
            ", latitude=" + latitude +
            ", longitude=" + longitude +
            ", batteryLevel=" + batteryLevel +
            ", vehicle=" + vehicle +
            '}';
    }
}
