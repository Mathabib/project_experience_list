<?php 

class project_model
{
    private $table = 'project_revisi';
    private $db;


    public function __construct()
    {
        $this->db= new Database;
    }

    public function getAllProject()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function addNewProject($data)
    {
        $project_number = $data['project_number'];
        $project_name = $data['project_name'];
        $project_manager = $data['project_manager'];
        $project_location = $data['project_location'];
    
        $category_array = [];
    
        if(isset($data['checkbox-study'])){
            $category_array[] = $data['checkbox-study'];
        }
    
        
        if(isset($data['checkbox-implementation'])){
            $category_array[] = $data['checkbox-implementation'];
        }
    
        $category = implode(' & ', $category_array);
    
        // sectors ==========
    
        $sectors_array = [];
    
        if(isset($data['nickel'])){
            $sectors_array[] = $data['nickel'];
        }
    
        if(isset($data['power'])){
            $sectors_array[] = $data['power'];
        }
    
        if(isset($data['coal'])){
            $sectors_array[] = $data['coal'];
        }
    
        if(isset($data['oil_&_gas'])){
            $sectors_array[] = $data['oil_&_gas'];
        }
    
        if(isset($data['tin'])){
            $sectors_array[] = $data['tin'];
        }
    
        if(isset($data['metal'])){
            $sectors_array[] = $data['metal'];
        }
    
        if(isset($data['gold'])){
            $sectors_array[] = $data['gold'];
        }
    
        if(isset($data['infrastructure'])){
            $sectors_array[] = $data['infrastructure'];
        }
    
        if(isset($data['building'])){
            $sectors_array[] = $data['building'];
        }
    
        if(isset($data['haul_road'])){
            $sectors_array[] = $data['haul_road'];
        }
    
    
        $sectors = implode(', ', $sectors_array);
    
        // service=======================
    
        $service_array = [];
    
        if(isset($data['feasibility_study'])){
            $service_array[] = $data['feasibility_study'];
        }
    
        if(isset($data['power_generation'])){
            $service_array[] = $data['power_generation'];
        }
    
        if(isset($data['detail_design'])){
            $service_array[] = $data['detail_design'];
        }
    
        if(isset($data['capex_opex'])){
            $service_array[] = $data['capex_opex'];
        }
    
        if(isset($data['oil_gas'])){
            $service_array[] = $data['oil_gas'];
        }
    
        if(isset($data['engineering'])){
            $service_array[] = $data['engineering'];
        }
    
        if(isset($data['coal_mine'])){
            $service_array[] = $data['coal_mine'];
        }
    
        if(isset($data['design_drafting'])){
            $service_array[] = $data['design_drafting'];
        }
    
        if(isset($data['minerals_metals'])){
            $service_array[] = $data['minerals_metals'];
        }
    
        if(isset($data['project_dev'])){
            $service_array[] = $data['project_dev'];
        }
    
        if(isset($data['steel_fabrication'])){
            $service_array[] = $data['steel_fabrication'];
        }
    
        if(isset($data['site_communications'])){
            $service_array[] = $data['site_communications'];
        }
    
        if(isset($data['feasibility_technical'])){
            $service_array[] = $data['feasibility_technical'];
        }
    
        if(isset($data['teaming_with'])){
            $service_array[] = $data['teaming_with'];
        }
    
    
        $service = implode(', ', $service_array);
    
        $project_description = $data['project_description'];
        $client = $data['client'];
        $project_start = $data['project_start'];
        $project_finish = $data['project_finish'];
        
    
        $extension_aray = explode('.', $_FILES['project_picture']['name']);
        $extension = end($extension_aray);
    
        $project_picture = $project_number . $project_name . '.' . $extension;
    

        $query = "INSERT INTO project_revisi VALUES (
            '', 
            :category, 
            :project_number, 
            :project_name, 
            :project_manager, 
            :project_location, 
            :sectors, 
            :services, 
            :project_description, 
            :client, 
            :project_start, 
            :project_finish, 
            :project_picture
            )";

        $this->db->query($query);
        $this->db->bind('category', $category);
        $this->db->bind('project_number', $project_number);
        $this->db->bind('project_name', $project_name);
        $this->db->bind('project_manager', $project_manager);
        $this->db->bind('project_location', $project_location);
        $this->db->bind('sectors', $sectors);
        $this->db->bind('services', $service);
        $this->db->bind('project_description', $project_description);
        $this->db->bind('client', $client);
        $this->db->bind('project_start', $project_start);
        $this->db->bind('project_finish',  $project_finish);        
        $this->db->bind('project_picture',  $project_picture);

        $this->db->execute();

        $tmp_project_picture = $_FILES['project_picture']['tmp_name'];
        move_uploaded_file($tmp_project_picture, "image/" . $project_picture);

        return $this->db->rowCount();
    }

    public function getSearch($data)
    {
        isset($data['category']) ? $category = $data['category'] : $category = '';                
        isset($data['sektor']) ? $sektor = $data['sektor'] : $sektor = '';                
        isset($data['service']) ? $service = $data['service'] : $service = '';     

        $sql = "SELECT * FROM $this->table WHERE category LIKE '%$category%' AND 
                                                 sektor LIKE '%$sektor%' AND
                                                 service LIKE '%$service%' ";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getProjectById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id_project = :id_project";
        $this->db->query($sql);
        $this->db->bind('id_project', $id);

        return $this->db->single();
    }

    public function editProject($data, $picture)
    {

        $id_project = $data['id_project'];
        $project_number = $data['project_number'];
        $project_name = $data['project_name'];
        $project_manager = $data['project_manager'];
        $project_location = $data['project_location'];
    
        $category_array = [];
    
        if(isset($data['checkbox-study'])){
            $category_array[] = $data['checkbox-study'];
        }
    
        
        if(isset($data['checkbox-implementation'])){
            $category_array[] = $data['checkbox-implementation'];
        }
    
        $category = implode(' & ', $category_array);
    
        // sectors ==========
    
        $sectors_array = [];
    
        if(isset($data['nickel'])){
            $sectors_array[] = $data['nickel'];
        }
    
        if(isset($data['power'])){
            $sectors_array[] = $data['power'];
        }
    
        if(isset($data['coal'])){
            $sectors_array[] = $data['coal'];
        }
    
        if(isset($data['oil_&_gas'])){
            $sectors_array[] = $data['oil_&_gas'];
        }
    
        if(isset($data['tin'])){
            $sectors_array[] = $data['tin'];
        }
    
        if(isset($data['metal'])){
            $sectors_array[] = $data['metal'];
        }
    
        if(isset($data['gold'])){
            $sectors_array[] = $data['gold'];
        }
    
        if(isset($data['infrastructure'])){
            $sectors_array[] = $data['infrastructure'];
        }
    
        if(isset($data['building'])){
            $sectors_array[] = $data['building'];
        }
    
        if(isset($data['haul_road'])){
            $sectors_array[] = $data['haul_road'];
        }
    
    
        $sector = implode(', ', $sectors_array);
    
        // service=======================
    
        $service_array = [];
    
        if(isset($data['feasibility_study'])){
            $service_array[] = $data['feasibility_study'];
        }
    
        if(isset($data['power_generation'])){
            $service_array[] = $data['power_generation'];
        }
    
        if(isset($data['detail_design'])){
            $service_array[] = $data['detail_design'];
        }
    
        if(isset($data['capex_opex'])){
            $service_array[] = $data['capex_opex'];
        }
    
        if(isset($data['oil_gas'])){
            $service_array[] = $data['oil_gas'];
        }
    
        if(isset($data['engineering'])){
            $service_array[] = $data['engineering'];
        }
    
        if(isset($data['coal_mine'])){
            $service_array[] = $data['coal_mine'];
        }
    
        if(isset($data['design_drafting'])){
            $service_array[] = $data['design_drafting'];
        }
    
        if(isset($data['minerals_metals'])){
            $service_array[] = $data['minerals_metals'];
        }
    
        if(isset($data['project_dev'])){
            $service_array[] = $data['project_dev'];
        }
    
        if(isset($data['steel_fabrication'])){
            $service_array[] = $data['steel_fabrication'];
        }
    
        if(isset($data['site_communications'])){
            $service_array[] = $data['site_communications'];
        }
    
        if(isset($data['feasibility_technical'])){
            $service_array[] = $data['feasibility_technical'];
        }
    
        if(isset($data['teaming_with'])){
            $service_array[] = $data['teaming_with'];
        }
    
    
        $service = implode(', ', $service_array);
    
        $project_description = $data['project_description'];
        $client = $data['client'];
        $project_start = $data['project_start'];
        $project_finish = $data['project_finish'];
        

        if($picture['project_picture']['error'] === 4){
            $project_picture = $data['old_project_picture'];
        } else {
    
            unlink("image/" . $data['old_project_picture']);
    
            $extension_aray = explode('.', $picture['project_picture']['name']);
            $extension = end($extension_aray);
    
            $project_picture = $project_name . '.' . $extension;
            $tmp_project_picture = $picture['project_picture']['tmp_name'];
            move_uploaded_file($tmp_project_picture, "image/" . $project_picture);
    
    
        }

        $sql = "UPDATE project_revisi SET
                           
        category = :category,
        project_number = :project_number,
        project_name = :project_name,
        project_manager = :project_manager,
        project_location = :project_location,
        sektor = :sektor,
        service = :service,
        project_description = :project_description,
        client = :client,
        project_start = :project_start,
        project_finish = :project_finish,        
        project_picture = :project_picture

        WHERE id_project = :id_project
         ";

        $this->db->query($sql);
        $this->db->bind('id_project',$id_project );
        $this->db->bind('category',$category );
        $this->db->bind('project_number',$project_number );
        $this->db->bind('project_name',$project_name );
        $this->db->bind('project_manager',$project_manager );
        $this->db->bind('project_location',$project_location );
        $this->db->bind('sektor',$sector );
        $this->db->bind('service',$service );
        $this->db->bind('project_description',$project_description );
        $this->db->bind('client',$client );
        $this->db->bind('project_start',$project_start );
        $this->db->bind('project_finish',$project_finish );
        $this->db->bind('project_picture',$project_picture );

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteProject($id_project){
        $this->db->query("SELECT project_picture FROM project_revisi WHERE id_project = $id_project");
        $data = $this->db->single();
        unlink("image/" . $data['project_picture']);
        $query = "DELETE FROM $this->table WHERE id_project = :id_project";
        $this->db->query($query);
        $this->db->bind('id_project', $id_project);
        $this->db->execute();
        return $this->db->rowCount();
    }
}


?>