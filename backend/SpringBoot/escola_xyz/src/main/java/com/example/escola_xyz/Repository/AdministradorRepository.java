package com.example.escola_xyz.Repository;

import org.springframework.data.repository.CrudRepository;

import com.example.escola_xyz.Model.administrador;

public interface AdministradorRepository extends CrudRepository<administrador,String>{
    //se precisar criar algum método específico de busca no banco eu crio aqui

    administrador findByCpf(String cpf); // busca pelo cpf no banco
}
