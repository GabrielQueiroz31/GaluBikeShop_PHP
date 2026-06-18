package com.gabrielqueiroz31.gamestore.Repository;

import org.springframework.data.repository.CrudRepository;

import com.gabrielqueiroz31.gamestore.Model.Game;

public interface GameRepository extends CrudRepository<Game, Integer> {
    
}
