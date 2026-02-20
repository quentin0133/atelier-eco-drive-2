// Calculer la moyenne de batterie par latitude / longitude pour le mois dernier
const oneMonthAgo = new Date();
oneMonthAgo.setMonth(oneMonthAgo.getMonth() - 1);
db.telemetry_history.aggregate([
    {
        $match: {
            timestamp: {
                $gte: oneMonthAgo
            }
        }
    },
    {
        $group: { 
            _id: { 
                latitude: { $round: ["$last_position.latitude", 3] },
                longitude: { $round: ["$last_position.longitude", 3] }
            },
            avgBattery: { 
                $avg: "$battery_level" 
            } 
        },  
    },
    { $count: "nbGroups" }
]);