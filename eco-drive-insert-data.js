db.telemetry_history.drop();
db.vehicles.drop();

const bulkVehicles = Array.from(
    { length: 100000 }, (_, i) => (
        {
            status: ["AVAILABLE", "UNAVAILABLE"][Math.floor(Math.random() * 2)],
            brand: ["Audi", "Renault", "Peugeot", "Tesla", "Citroën", "Twingo"][Math.floor(Math.random() * 6)],
            model: {
                name: ["San diego", "Michaelo", "Model X", "Model Y", "Model Z", "Danielo"][Math.floor(Math.random() * 6)]
            },
            registration: "VX-000-XX",
            incident_histories: [],
            _class: "fr.dawan.formation.models.Vehicle"
        }
    )
);

let vehiclesResult = db.vehicles.insertMany(bulkVehicles);

const bulkTelemetryHistories = Array.from(
    { length: 100000 }, (_, i) => (
        {
            battery_level: Math.random() * 100,
            last_position: {
                latitude: Math.random() * 15 + 6,
                longitude: Math.random() * 15 + 6
            },
            vehicle_id: vehiclesResult.insertedIds[i]
        }
    )
);

db.telemetry_history.insertMany(bulkTelemetryHistories);