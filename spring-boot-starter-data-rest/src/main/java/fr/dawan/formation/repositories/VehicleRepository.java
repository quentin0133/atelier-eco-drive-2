package fr.dawan.formation.repositories;

import fr.dawan.formation.models.Vehicle;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

import java.util.List;

@RepositoryRestResource(collectionResourceRel = "vehicles", path = "vehicles")
public interface VehicleRepository extends MongoRepository<Vehicle, String> {
    List<Vehicle> findByStatus(@Param("status") String status);
}
