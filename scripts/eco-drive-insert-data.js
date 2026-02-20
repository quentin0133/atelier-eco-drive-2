db.telemetry_history.drop();
db.vehicles.drop();

function randomDate(start, end) {
  return new Date(
    start.getTime() + Math.random() * (end.getTime() - start.getTime())
  );
}

const bulkVehicles = Array.from(
    { length: 100000 }, (_, i) => (
        {
            brand: ["Audi", "Renault", "Peugeot", "Tesla", "Citroën", "Twingo"][Math.floor(Math.random() * 6)],
            status: ["AVAILABLE", "UNAVAILABLE"][Math.floor(Math.random() * 2)],
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
            last_position: {
                latitude: Math.random() * 5,
                longitude: Math.random() * 5
            },
            timestamp: randomDate(new Date(2025, 0, 1), new Date()),
            battery_level: Math.floor(Math.random() * 100),
            vehicle_id: vehiclesResult.insertedIds[i]
        }
    )
);

db.telemetry_history.insertMany(bulkTelemetryHistories);