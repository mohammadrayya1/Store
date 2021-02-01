<?php


namespace PHPMVC\lib\Templet;





class Templet
{
    use TempletHelper;
private $_templeparts;
private $_action_view;
private $_data;
private $_registry;



    public function __get($key)
{
    return $this->_registry->$key;

}
    public function setRegistary($object)
    {
     $this->_registry=$object;

    }


function __construct(array $_templeparts)
{
    $this->_templeparts=$_templeparts;
}

public  function setactionview($actionview)
{
    $this->_action_view=$actionview;
}

public function setappdata($data)
{
    $this->_data=$data;
}
public function swapTemplet($templet)

    {


        $this->_templeparts['template']=$templet;
    }


public function renderTempletHeaderStart()
{
    extract($this->_data);
    require_once(TEMPLATE_PATH . 'templateheaderstart.php');
}

    public function renderTempletHeaderEnd()

    {  extract($this->_data);
        require_once(TEMPLATE_PATH . 'templateheaderend.php');
    }

    public function renderTempletfooter()
    {  extract($this->_data);
        require_once(TEMPLATE_PATH . 'templatefooter.php');
    }



   private function renderTempletBlock()
    {
        extract($this->_data);
       if(!array_key_exists('template',$this->_templeparts))
       {
           trigger_error("sorry please finde the templet",E_USER_ERROR);
       }else
           {
               $parts=$this->_templeparts['template'];
               if(!empty($parts)){
               foreach ($parts as $key=>$file)
               {
                   extract($this->_data);

                   if($key===':view') {

                       require_once $this->_action_view;
                   }else
                       {
                           require_once $file;
                       }
               }
           }
           }

    }



    //templete Resoursec
    private function renderTempletResources()
    {  extract($this->_data);
        $output="";
        if(!array_key_exists('header_resources',$this->_templeparts))
        {
            trigger_error("sorry please finde the header_resources",E_USER_ERROR);
        }else
        {
            $resoursec=$this->_templeparts['header_resources'];
            //Generate CSS Links
            $css=$resoursec['css'];
            if(!empty($css))
            {
                foreach ($css as  $csskey=>$csspath)
                {
                     $output.='<link  rel="stylesheet" href="'.$csspath.'"/>';
                }
            }

            $js=$resoursec['js'];
            if(!empty($js))
            {
                foreach ($js as  $jskey=>$jspath)
                {
                    $output.='<script src="'.$jspath.'"></script>';
                }
            }
        }
echo $output;
    }
    private function renderFooterResources()
    {   extract($this->_data);
        $output="";
        if(!array_key_exists('footer_resources',$this->_templeparts))
        {
            trigger_error("sorry please finde the footer_resources",E_USER_ERROR);
        }else
        {
            $footerresoursec=$this->_templeparts['footer_resources'];
            //Generate CSS Links
            extract($this->_data);
            if(!empty($footerresoursec))
            {
                foreach ($footerresoursec as  $footerkey=>$footerpath)
                {
                    $output.='<script src="'.$footerpath.'"></script>';
                }
            }

        }
        echo $output;
    }


    public function  renderApp()
{
   extract($this->_data);
   $this->renderTempletHeaderStart();
   $this->renderTempletResources();
   $this->renderTempletHeaderEnd();
   $this->renderTempletBlock();
   $this->renderFooterResources();
   $this->renderTempletfooter();

}
}