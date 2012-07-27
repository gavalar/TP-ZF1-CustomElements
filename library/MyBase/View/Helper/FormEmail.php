<?php

class MyBase_View_Helper_FormEmail extends Zend_View_Helper_FormText
{
    public function formEmail($name, $value = null, $attribs = null)
    {
       $info = $this->_getInfo($name, $value, $attribs);
       extract($info);

       $xhtml = $this->formText($name, $value, $attribs) .
                    '<span class="' . $this->view->escape($id) . '" style="display:none;">OK</span>';

       $xhtml .= '
        <script>
             $("#' . $this->view->escape($id) . '").blur(function() {
                if($("#' . $this->view->escape($id) . '").val() != "") {
                    $("span.' . $this->view->escape($id) . '").show();
                } else {
                    $("span.' . $this->view->escape($id) . '").hide();
                }
            });
        </script>';

        return $xhtml;
    }
}
