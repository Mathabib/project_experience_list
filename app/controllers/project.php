<?php


class project extends Controller {

    public function index() 
    {
        if(isset($_POST['search']) or isset($_POST['viewAll'] ))
        {
            $data['css'] = BASEURL . '/css/project.css';
            $data['css_addProject'] = BASEURL . '/css/addProject.css';
            $data['js'] = BASEURL . '/js/project.js';
            $data['all_project'] = $this->model('project_model')->getAllProject();
            $data['project'] = $this->model('project_model')->getSearch($_POST);
            $data['sektor'] = $this->model('chart_model')->getAllProjectChart();
            $this->view('template/header', $data);
            $this->view('project/index', $data);
            $this->view('template/footer', $data);

        } else {

        $data['css'] = BASEURL . '/css/project.css';
        $data['css_addProject'] = BASEURL . '/css/addProject.css';
        $data['js'] = BASEURL . '/js/project.js';
        $data['project'] = $this->model('project_model')->getAllProject();
        $data['sektor'] = $this->model('chart_model')->getAllProjectChart();
        $this->view('template/header', $data);
        $this->view('project/index', $data);
        $this->view('template/footer', $data);
        }
        
    }

    public function getProject()
    {
        echo json_encode( $this->model('project_model')->getProjectById($_POST['id_project']));
    }

    public function addProject()
    {
        if( $this->model('project_model')->addNewProject($_POST) > 0)
        {
            Flasher::setFlash('successfully', 'added', 'success');
            header('location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'to added', 'danger');
            header('location: ' . BASEURL);
            exit;
        }
    }

    public function editProject()
    {
        if( $this->model('project_model')->editProject($_POST, $_FILES) > 0)
        {
            Flasher::setFlash('succesfully', 'changed', 'success');
            header('location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'changed', 'danger');
            header('location: ' . BASEURL);
            exit;
        }
    }

    public function deleteProject($id_project)
    {
        
        if( $this->model('project_model')->deleteProject($id_project) > 0)
        {
            Flasher::setFlash('succesfully', 'deleted', 'success');
            header('location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'deleted', 'danger');
            header('location: ' . BASEURL);
            exit;
        }
    }

    public function open_chart()
    {
        $data = [];
        if(isset($_POST['from_year'], $_POST['to_year'])){
            $data['year'] = $this->model('chart_model')->get_year_filtered($_POST['from_year'], $_POST['to_year']);
            $data['sektor'] = $this->model('chart_model')->get_chart_filtered($_POST['from_year'], $_POST['to_year']);
            $this->view('project/charts', $data);
            return;
        }
        
        $data['year'] = $this->model('chart_model')->get_year_chart();
        $data['sektor'] = $this->model('chart_model')->get_chart();
        $this->view('project/charts', $data);
    }

    public function filter_chart(){

        if(isset($_POST)){
            $data['from_year'] = $_POST['from_year'];
            $data['to_year'] = $_POST['to_year'];
        }
        
    }
    
}

?>