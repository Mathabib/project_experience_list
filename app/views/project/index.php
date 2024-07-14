<div class="container-fluid">

    <div class="kontainer_legend_chart non_print">  
        <div class="legend_and_feature">

        <!-- =======================legend============== -->
        <div class="legend">
            <div class="legend-container">
                <div class="kotak oren"></div>
                <p class="">study</p>

            </div>

            <div class="legend-container">
            <div class="kotak hijau"></div>
                <p class="">implementation</p>
            </div>

            <div class="legend-container">
            <div class="kotak cyan"></div>
                <p class="">implementation & study</p>
            </div>
        </div>

        <!-- ====================button feature============= -->
        <div class="feature ms-4" >

        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
            FILTER
        </button>
        
                    
            <div class="add-button">
            <a href="#"><button id="addProjectButton" class="btn btn-success add_new" data-bs-toggle="modal" data-bs-target="#formModal">Add New Project</button></a>
            <a href="<?=BASEURL?>/project/open_chart"><button class="btn btn-success add_new">View Chart</button></a>      
            <a ><button class="btn btn-danger add_new" onclick="printPage()">Print to PDF</button></a>
            </div>
            
        </div>
        
        </div>

        <!-- ======================chart diagram======================= -->
      <div class="wadah" >
          <h5>Project Sectors QTY</h5>
          <canvas id="myChart"></canvas>
      </div>

    </div>

    <div class="collapse ms-4 mt-3"  id="collapseFilter">
        <form action="<?=BASEURL?>/" method="post">
            <div class="card card-body"> 
                <div class="search_form">
                    <div class="search_form_item">
                        <label>category</label>
                        <input id="search_category" name="category" >
                    </div>
                    <div class="search_form_item">
                        <label>sector</label>
                        <input id="search_sector" name="sektor">
                    </div>
                    <div class="search_form_item">
                        <label>service</label>
                        <input id="search_service" name="service">
                    </div>
                    <div class="search_form_item"><button class="btn btn-primary"name="search" type="submit">FILTER</button></div>
                    <div class="search_form_item"><button class="btn btn-primary"name="viewAll" type="submit">viewAll</button></div>
                </div>               
            
            </div>
        </form>
    </div>
       
  

        
    <div>
      <div class="col-lg-6">
        <?php Flasher::flash() ?>
      </div>
    </div>

    <!-- <div id="percobaan"></div> -->

  <div class="table_container container-fluid mt-5 non_print" id="percobaan" >
    
    <div class="table_container" >
        <table class="table table-bordered project_table" style="width: 100%">
        <tr>
            <th class="table_head">cat</th>
            <th class="table_head">Project Number</th>
            <th class="table_head">Project Name</th>
            <th class="table_head">Project Manager</th>
            <th class="table_head">Project Location</th>
            <th class="table_head">Sector</th>
            <th class="table_head">Service</th>
            <th class="table_head">Project Description</th>
            <th class="table_head">Client</th>
            <th class="table_head">Project Start</th>
            <th class="table_head">Project Finish</th>
            <th class="table_head">Project Picture</th>

            
        </tr>
        
        <?php 
        
        ?>

        <?php foreach($data['project'] as $project): ?>
        <tr class="project_content percobaan"  data-bs-toggle="modal" data-bs-target="#formModal" data-id_project=<?=$project['id_project']?>  data-project_name=<?=$project['project_name']?> >
            <td class="type"><?=$project['category'] ?></td>
            <td><p class="td td-content"><?=$project['project_number'] ?></p></td>
            <td><p class="td"><?=$project['project_name'] ?></p></td>
            <td><p class="td"><?=$project['project_manager'] ?></p></td>
            <td><p class="td"><?=$project['project_location'] ?></p></td>
            <td>
                <ul  >
                    <?php $key_words = explode(', ', $project['sektor']); ?>
                    <?php foreach($key_words as $key_word): ?>
                    <li class="table_keywords_list td"><?=$key_word?></li>
                    <?php endforeach ?>
                </ul>
            </td>

            <td>
                <ul >
                    <?php $key_words = explode(', ', $project['service']); ?>
                    <?php foreach($key_words as $key_word): ?>
                    <li class="table_keywords_list td"><?=$key_word?></li>
                    <?php endforeach ?>
                </ul>
            </td>

            <td><p class="td"><?php echo nl2br($project['project_description']) ?></p></td>

            <td><p class="td"><?=$project['client'] ?></p></td>

            <td><p class="td"><?=$project['project_start'] ?></p></td>

            <td><p class="td"><?=$project['project_finish'] ?></p></td>

            <td><img src ="image/<?=$project['project_picture'] ?>" width="200px" ></td>
                    
        </tr>
        <?php endforeach;?>    
        </table>
    </div>

  </div>



</div>


<div class="table_container print_section" id="percobaan" >
    
    <div class="table_container" >
        <table class="table table-bordered project_table project_table_print" style="width: 100%">
            <thead>
            <tr>
                <th class="table_head">cat</th>
                <th class="table_head">Project Number</th>
                <th class="table_head">Project Name</th>
                <th class="table_head">Project Manager</th>
                <th class="table_head">Project Location</th>
                <th class="table_head">Sector</th>
                <th class="table_head">Service</th>
                <th class="table_head">Project Description</th>
                <th class="table_head">Client</th>
                <th class="table_head">Project Start</th>
                <th class="table_head">Project Finish</th>
                <th class="table_head">Project Picture</th>

                
            </tr>
            </thead>

            <?php foreach($data['project'] as $project): ?>
            <tr class="project_content percobaan"  data-bs-toggle="modal" data-bs-target="#formModal" data-id_project=<?=$project['id_project']?>  data-project_name=<?=$project['project_name']?> >
                <td class="type"><?=$project['category'] ?></td>
                <td><p class="td td-content"><?=$project['project_number'] ?></p></td>
                <td><p class="td"><?=$project['project_name'] ?></p></td>
                <td><p class="td"><?=$project['project_manager'] ?></p></td>
                <td><p class="td"><?=$project['project_location'] ?></p></td>
                <td>
                    <ul  >
                        <?php $key_words = explode(', ', $project['sektor']); ?>
                        <?php foreach($key_words as $key_word): ?>
                        <li class="table_keywords_list td"><?=$key_word?></li>
                        <?php endforeach ?>
                    </ul>
                </td>

                <td>
                    <ul >
                        <?php $key_words = explode(', ', $project['service']); ?>
                        <?php foreach($key_words as $key_word): ?>
                        <li class="table_keywords_list td"><?=$key_word?></li>
                        <?php endforeach ?>
                    </ul>
                </td>

                <td><p class="td"><?php echo nl2br($project['project_description']) ?></p></td>

                <td><p class="td"><?=$project['client'] ?></p></td>

                <td><p class="td"><?=$project['project_start'] ?></p></td>

                <td><p class="td"><?=$project['project_finish'] ?></p></td>

                <td><img src ="image/<?=$project['project_picture'] ?>" width="200px" ></td>
                        
            </tr>
            <?php endforeach;?>    
        </table>
    </div>

</div>




<!--================================ Modal========================== -->

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Add Project</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-input" action="<?=BASEURL?>/project/addProject" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            
        
            <div class="container-input">

                

                <div class="form-input-container">
                <input type="hidden" id="id_project" name="id_project">
                <input type="hidden" class="form-control"  id="old_project_picture" name="old_project_picture">

                    <div class="mb-3">
                        <label for="project_number" class="form-label">Project Number : </label>
                        <input type="text" class="form-control" id="project_number" name="project_number" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name : </label>
                        <input type="text" class="form-control" id="project_name" name="project_name" autocomplete="off" >
                    </div>

                    <div class="mb-3">
                        <label for="project_manager" class="form-label">Project Manager : </label>
                        <input type="text" class="form-control" id="project_manager" name="project_manager" autocomplete="off" >
                    </div>

                    <div class="mb-5">
                        <label for="project_location" class="form-label">Project Location : </label>
                        <input type="text" class="form-control" id="project_location" name="project_location" autocomplete="off"  >
                    </div>

                        <p>Project Category : </p>
                        <div class="mb-3 checkbox_category">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="study" id="study" name="checkbox-study">
                            <label class="form-check-label" for="study">
                                Study
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="implementation" id="implementation" name="checkbox-implementation">
                            <label class="form-check-label" for="implementation">
                                Implementation
                            </label>
                        </div>
                        </div>


                    <!-- ==================sektor============= -->

                    <div class="sektor">
                    <p>Sektor : </p>

                        <div class="checkbox_sektor">    
                        <div class="checkbox_sektor_left">
                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="nickel" id="nickel" name="nickel">
                                <label class="form-check-lebel" for="nickel">Nickel</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="power" id="power" name="power">
                                <label class="form-check-lebel" for="power">Power</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="coal" id="coal" name="coal">
                                <label class="form-check-lebel" for="coal">Coal</label>
                            </div>


                        </div>

                        <div class="checkbox_sektor_right">


                        <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="oil & gas" id="oil_gas" name="oil_&_gas">
                                <label class="form-check-lebel" for="oil_gas">Oil & Gas</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="tin" id="tin" name="tin">
                                <label class="form-check-lebel" for="tin">Tin</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="metal" id="metal" name="metal">
                                <label class="form-check-lebel" for="metal">Metal</label>
                            </div>

                        </div>

                        <div class="checkbox_sektor_right">


                        <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="gold" id="gold" name="gold">
                                <label class="form-check-lebel" for="gold">Gold</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="infrastructure" id="infrastructure" name="infrastructure">
                                <label class="form-check-lebel" for="infrastructure">Infrastructure</label>
                            </div>

                            <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="building" id="building" name="building">
                                <label class="form-check-lebel" for="building">Building</label>
                            </div>

                        </div>

                        <div class="checkbox_sektor_right">


                        <div class="checkbox_sektor_item">
                                <input class="form-check-input" type="checkbox" value="haul road" id="haul_road" name="haul_road">
                                <label class="form-check-lebel" for="haul_road">Haul Road</label>
                            </div>

                        </div>

                        </div>

                    </div>


                    <!-- ============service================= -->

                    <div class="service mb-5">

                        <p>Service : </p>
                        <div class="checkbox_service">
                            
                            <div class="checkbox_service_right">
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Feasibility Study" id="feasibility_study" name="feasibility_study">
                                    <label class="form-check-lebel" for="feasibility_study">Feasibility Study </label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Power Generation" id="power_generation" name="power_generation">
                                    <label class="form-check-lebel" for="power_generation">Power Generation</label>
                                </div>


                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Detail Design" id="detail_design" name="detail_design">
                                    <label class="form-check-lebel" for="detail_design">Detail Design</label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Capex Opex" id="capex_opex" name="capex_opex">
                                    <label class="form-check-lebel" for="capex_opex">Capex Opex</label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Oil & Gas" id="oil_gas_service" name="oil_gas">
                                    <label class="form-check-lebel" for="oil_gas_service">Oil & Gas</label>
                                </div>



                            </div>

                            <div class="checkbox_service_right">


                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Engineering Services" id="engineering" name="engineering">
                                    <label class="form-check-lebel" for="engineering">Engineering Services</label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Coal Mine Development" id="coal_mine" name="coal_mine">
                                    <label class="form-check-lebel" for="coal_mine">Coal Mine Development</label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Design & Drafting Service" id="design_drafting" name="design_drafting">
                                    <label class="form-check-lebel" for="design_drafting">Design & Drafting Service</label>
                                </div>
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Minerals & Metals Development" id="minerals_metals" name="minerals_metals">
                                    <label class="form-check-lebel" for="minerals_metals">Minerals & Metals Development</label>
                                </div>
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Project Development & Construction Service" id="project_dev" name="project_dev">
                                    <label class="form-check-lebel" for="project_dev">Project Development & Construction Service</label>
                                </div>





                            </div>


                            <div class="checkbox_service_right">
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Steel Fabrication Management" id="steel_fabrication" name="steel_fabrication">
                                    <label class="form-check-lebel" for="steel_fabrication">Steel Fabrication Management</label>
                                </div>

                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Site Communications & IT System Design" id="site_communications" name="site_communications">
                                    <label class="form-check-lebel" for="site_communications">Site Communications & IT System Design</label>
                                </div>
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Feasibility Studies & Technical Due Diligence" id="feasibility_technical" name="feasibility_technical">
                                    <label class="form-check-lebel" for="feasibility_technical">Feasibility Studies & Technical Due Diligence</label>
                                </div>
                                
                                <div class="checkbox_sektor_item">
                                    <input class="form-check-input" type="checkbox" value="Teaming with leading Coal Process Design Groups" id="teaming_with" name="teaming_with">
                                    <label class="form-check-lebel" for="teaming_with">Teaming with leading Coal Process Design Groups</label>
                                </div>



                            </div>

                            
                        </div>
                    </div>

                    

                    
                

                    

                    <div class="mb-3">
                        <label for="project_description" class="form-label">Project Description : </label>
                        <textarea class="form-control" id="project_description" name="project_description" rows="3"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="client" class="form-label">Client : </label>
                        <input type="text" class="form-control" id="project_client" name="client" autocomplete="off" >
                    </div>




                    <!-- =============project start and finish================== -->

                    <div class="mb-5 duration">
                        
                        <div class="project_duration">
                            <div>
                                <p>Project Start</p>
                                <input type="date" class="form-control " id="project_start" name="project_start">
                            </div>

                            <div>
                                <p>Project Finish</p>
                                <input type="date" class="form-control " id="project_finish" name="project_finish">
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <img id="project_image" src="" width="200px">
                    </div>
                    
                    <div class="mb-3">
                        <label for="project_picture" class="form-label">Project Picture : </label>
                        <input class="form-control" type="file" name="project_picture" id="project_picture">
                    </div>

                </div>


            

            </div>

        </div>
        <div class="modal-footer">
            <a href="" id="deleteProject" onclick="return confirm('are you sure ? ')"><button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Delete</button></a>
            <button type="submit" id="formButton2" class="btn btn-success">Add Project</button>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- ============================================INI BAGIAN CHART==================== -->

<script type="module" src="<?=BASEURL?>/chartjs/chart.js"></script>

<script type="module">

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Nickel', 'Coal', 'Power', 'Oil & Gas', 'Tin', 'Metal', 'gold', 'infrastructure', 'building', 'haul road'],
      datasets: [{
        label: '',
        data: [
            <?php foreach($data['sektor'] as $sektor_aray): ?>
                <?php echo $sektor_aray . ", " ?>
            <?php endforeach ?>
        ],
        borderWidth: 1,
        backgroundColor: [
          'rgb(196, 193, 164)',
          'rgb(54, 162, 235)',
          'rgb(15, 15, 15)',
          'rgb(162, 197, 121)',
          'rgb(125, 124, 124)',
          'rgb(97, 103, 122)',
          'rgb(255, 176, 0)',
          'rgb(79, 111, 82)',
          'rgb(1, 116, 190)',
          'rgb(206, 206, 90)'
        ],
      }],
      
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          border: {
            display: true
          },
          grid: {
            color : 'rgb(0, 0, 0)'
          }
        },
        x: {
          beginAtZero: true,
          border: {
            display: true
          },
          grid: {
            color : 'rgb(0, 0, 0)'
          }
        }
      }
    }
  });


</script>


