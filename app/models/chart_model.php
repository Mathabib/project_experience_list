<?php 

class chart_model{
    private $table = 'project_revisi';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProjectChart()
    {

        $nickel = 0;
        $coal = 0;
        $power = 0;
        $oil_gas = 0;
        $tin = 0;
        $metal = 0;
        $gold = 0;
        $infrastructure = 0;
        $building = 0 ;
        $haul_road = 0;

        $this->db->query("SELECT * FROM $this->table");
        $hasil = $this->db->resultSet();
        foreach($hasil as $sektor ){
            $nickel += preg_match_all('/\bnickel\b/i', $sektor['sektor']);
            $coal += preg_match_all('/\bcoal\b/i', $sektor['sektor']);
            $power += preg_match_all('/\bpower\b/i', $sektor['sektor']);
            $oil_gas += preg_match_all('/\boil & gas\b/i', $sektor['sektor']);
            $tin += preg_match_all('/\btin\b/i', $sektor['sektor']);
            $metal += preg_match_all('/\bmetal\b/i', $sektor['sektor']);
            $gold += preg_match_all('/\bgold\b/i', $sektor['sektor']);
            $infrastructure += preg_match_all('/\binfrastructure\b/i', $sektor['sektor']);
            $building += preg_match_all('/\bbuilding\b/i', $sektor['sektor']);
            $haul_road += preg_match_all('/\bhaul road\b/i', $sektor['sektor']);

        }

        $sektor_aray = ["nickel" => $nickel,
                        "coal" => $coal,
                        "power" => $power,
                        "oil_gas" => $oil_gas,
                        "tin" => $tin,
                        "metal" => $metal,
                        "gold" => $gold,
                        "infrastructure" => $infrastructure,
                        "building" => $building,
                        "haul_road" => $haul_road ];
        
        return $sektor_aray;
        
    }

    public function get_year_chart()
    {
        $tahun_aray = [];
        $this->db->query("SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC limit 5");
        $this->db->execute();
        $year = $this->db->resultSet();
        foreach($year as $tahun){
            array_push($tahun_aray, $tahun['tahun']);
        }

        return $tahun_aray;
    }

    public function get_chart()
    {
        $tahun_aray = [];
        $this->db->query("SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC limit 5");
        $this->db->execute();
        $year = $this->db->resultSet();
        foreach($year as $tahun){
            array_push($tahun_aray, $tahun['tahun']);
        }

        $nickel = [];
        $power = [];
        $coal = [];
        $oil_gas = [];
        $tin = [];
        $metal = [];
        $gold = [];
        $infrastructure = [];
        $building = [];
        $haul_road = [];

        foreach($tahun_aray as $tahun){
           $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
           $data = $this->db->resultSet();
           $sektor = 0;
           foreach($data as $row){
            $sektor += preg_match_all('/\bnickel\b/i', $row['sektor']);
           }
           $nickel[] = $sektor;
           
        }

        foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bpower\b/i', $row['sektor']);
            }
            $power[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bcoal\b/i', $row['sektor']);
            }
            $coal[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\boil & gas\b/i', $row['sektor']);
            }
            $oil_gas[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\btin\b/i', $row['sektor']);
            }
            $tin[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bmetal\b/i', $row['sektor']);
            }
            $metal[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bgold\b/i', $row['sektor']);
            }
            $gold[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\binfrastructure\b/i', $row['sektor']);
            }
            $infrastructure[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bbuilding\b/i', $row['sektor']);
            }
            $building[] = $sektor;
            
         }

         foreach($tahun_aray as $tahun){
            $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
            $data = $this->db->resultSet();
            $sektor = 0;
            foreach($data as $row){
             $sektor += preg_match_all('/\bhaul road\b/i', $row['sektor']);
            }
            $haul_road[] = $sektor;
            
         }

         
        $sektor_quantity = [
            "nickel" => $nickel,
            "coal" => $coal,
            "power" => $power,
            "oil_gas" => $oil_gas,
            "tin" => $tin,
            "metal" => $metal,
            "gold" => $gold,
            "infrastructure" => $infrastructure,
            "building" => $building,
            "haul_road" => $haul_road 
        ];
        
        return $sektor_quantity;
    }



    // ===================================================================
        // BUAT KEPERLUAN HALAMAN CHART 

        public function get_year_filtered($from_year, $to_year)
        {

            if($to_year == ""){
                $to_year = $from_year;
            }

            $tahun_aray = [];
            $this->db->query("SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi WHERE YEAR(project_start) BETWEEN $from_year AND $to_year ORDER BY tahun ASC limit 5");
            $this->db->execute();
            $year = $this->db->resultSet();
            foreach($year as $tahun){
                array_push($tahun_aray, $tahun['tahun']);
            }
    
            return $tahun_aray;
        }

        
        public function get_chart_filtered($from_year, $to_year)
        {
            
            if($to_year == ""){
                $to_year = $from_year;
            }
            
            $tahun_aray = [];
            $this->db->query("SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi WHERE YEAR(project_start) BETWEEN $from_year AND $to_year ORDER BY tahun ASC");
            $this->db->execute();
            $year = $this->db->resultSet();
            foreach($year as $tahun){
                array_push($tahun_aray, $tahun['tahun']);
            }
    
            $nickel = [];
            $power = [];
            $coal = [];
            $oil_gas = [];
            $tin = [];
            $metal = [];
            $gold = [];
            $infrastructure = [];
            $building = [];
            $haul_road = [];
    
            foreach($tahun_aray as $tahun){
               $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
               $data = $this->db->resultSet();
               $sektor = 0;
               foreach($data as $row){
                $sektor += preg_match_all('/\bnickel\b/i', $row['sektor']);
               }
               $nickel[] = $sektor;
               
            }
    
            foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bpower\b/i', $row['sektor']);
                }
                $power[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bcoal\b/i', $row['sektor']);
                }
                $coal[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\boil & gas\b/i', $row['sektor']);
                }
                $oil_gas[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\btin\b/i', $row['sektor']);
                }
                $tin[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bmetal\b/i', $row['sektor']);
                }
                $metal[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bgold\b/i', $row['sektor']);
                }
                $gold[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\binfrastructure\b/i', $row['sektor']);
                }
                $infrastructure[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bbuilding\b/i', $row['sektor']);
                }
                $building[] = $sektor;
                
             }
    
             foreach($tahun_aray as $tahun){
                $this->db->query("SELECT * FROM project_revisi WHERE YEAR(project_start)=$tahun ");
                $data = $this->db->resultSet();
                $sektor = 0;
                foreach($data as $row){
                 $sektor += preg_match_all('/\bhaul road\b/i', $row['sektor']);
                }
                $haul_road[] = $sektor;
                
             }
    
             
            $sektor_quantity = [
                "nickel" => $nickel,
                "coal" => $coal,
                "power" => $power,
                "oil_gas" => $oil_gas,
                "tin" => $tin,
                "metal" => $metal,
                "gold" => $gold,
                "infrastructure" => $infrastructure,
                "building" => $building,
                "haul_road" => $haul_road 
            ];
            
            return $sektor_quantity;
        }
}


?>