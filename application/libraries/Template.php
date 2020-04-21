<?php
class Template{
  protected $_ci;

  function __construct(){
    $this->_ci = &get_instance();
  }

  function display($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
    $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
    $data['sidebar'] = $this->_ci->load->view('template/sidebar', $data, TRUE);
    $data['content'] = $this->_ci->load->view($content, $data, TRUE);
    $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);

    $this->_ci->load->view('template/index', $data);
  }

  function pdfgenerator($html, $filename){
    // instantiate and use the dompdf class
    $dompdf = new Dompdf\Dompdf(array('enable_remote' => true));
    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment' => 0, ));
  }


}