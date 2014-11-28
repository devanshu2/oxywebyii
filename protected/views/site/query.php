<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $this SiteController */

$this->pageTitle='Query - '.Yii::app()->name ;
?>
<!--  Start content container -->
<div id="contentCntr" class="contentbg">

    <div class="listingWrap">
        <!--  Start Filter container -->
        <div class="filterwrap inner-width queryhead">
            <h2>Need help or feed us back with opinion and ideas</h2>

            <div class="clear"></div>
        </div>
        <!--  End Filter container -->

    </div>

    <div class="inner-width">
        <form id="queryform" name="queryform" onsubmit="return callFaqFormSubmit(this)">
            <div class="queryform"><label>Name <span>*</span></label><input type="text" value="" name="name" required="required" /></div>
            <div class="queryform"><label>Email Address <span>*</span></label><input type="email" name="email" required="required" /></div>
            <div class="queryform"><label>Contact Number</label><input type="tel" name="phone" /></div>
            <div class="queryform"><label>Message <span>*</span></label><textarea required="required" name="message"></textarea></div>
            <input type="submit" value="Submit" />
        </form>
        <div class="clear"></div>
    </div>  



</div>
      
		<!--  End content container -->
                
<script type="text/javascript">
    var ajaxhandler = false;
    function callFaqFormSubmit(frm){
        frm = jQuery(frm);
        var data = { userName : $.trim($('input[name="name"]', frm).val()), userEmail : $.trim($('input[name="email"]', frm).val()), userPhone : $.trim($('input[name="phone"]', frm).val()), userMessage : $.trim($('textarea[name="message"]', frm).val()) };
        if(!data.userName.length){
            alert('Please provide a valid name.');
            $('input[name="name"]', frm).focus();
            return false;
        }
        if(!validateEmail(data.userEmail)){
            alert('Please provide a valid name.');
            $('input[name="name"]', frm).focus();
            return false;
        }
        if(!data.userMessage.length){
            alert('Please provide a valid message.');
            $('textarea[name="message"]', frm).focus();
            return false;
        }
        try{ ajaxhandler.stop(); } catch(err){ }
        loader.begin();
        ajaxhandler = $.ajax({
            type : 'post',
            url : baseURL + '/index.php/webservice/sendFaqEmail',
            data : data,
            dataType : 'json',
            beforeSend: function(xhr){xhr.setRequestHeader('API_TOKEN', '142d3a2e50fd9a643e0f8a7c2f');},
            error : function(jqXHR, textStatus, errorThrown){
                loader.stop();
                window.alert('Network Unreachable.');
            },
            success : function(msg){
                loader.stop();
				frm.get(0).reset();
				return;
                if(typeof msg.ErrorCode !== "undefined"){
                    if(msg.ErrorCode == 0){
                        alert('We have recived your request. We will revert you shortly.');
                form('queryform').reset();
                    }
                    else{
                        alert('Unable to reach server. Please try later.');
                    }
                }
            }
        });
        return false;
    }
    function validateEmail(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
    var form; 

(function()
{
    "use strict";

    //name must be a valid form name eg. <form name="myFormName" ...
    form = function(name)
    {
        var a =
        {
            "registerReset": function()
            {
                //if the boxShadow property exists, bind the reset event handler
                //to the named form

                if(typeof document.forms[name].style.boxShadow !== 'undefined')
                {
                    document.forms[name].addEventListener('reset', a.resetEventHandler);
                }
            },

            "reset": function()
            {
                a.registerReset();
                document.forms[name].reset();
            },

            "resetEventHandler": function()
            {
                //override the default style and apply no boxShadow and register
                //an invalid event handler to each of the form's input controls
                function applyFix(inputControls)
                {
                    for(var i=0;i<inputControls.length;i++)
                    {

                        inputControls[i].style.boxShadow = 'none';
                        inputControls[i].addEventListener('invalid', a.invalidEventHandler);
                        inputControls[i].addEventListener('keydown', a.keydownEventHandler);
                    }
                }

                var inputControls = this.getElementsByTagName('input');
                applyFix(inputControls);

                var inputControls = this.getElementsByTagName('textarea');
                applyFix(inputControls);

                var inputControls = this.getElementsByTagName('select');
                applyFix(inputControls);

            },

            "invalidEventHandler": function()
            {

                this.style.boxShadow = '';
                this.removeEventListener('invalid', a.invalidEventHandler);
                this.removeEventListener('keydown', a.keydownEventHandler);
            },

            //the following functions emulates the restore of :-moz-ui-invalid
            //when the user interacts with a form input control
            "keydownEventHandler": function()
            {
                this.addEventListener('blur', a.blurEventHandler);
            },

            "blurEventHandler": function()
            {
                this.checkValidity();
                this.removeEventListener('blur', a.blurEventHandler);
            }
        };

        return a;
    }

})();

form('queryform').registerReset();
</script>