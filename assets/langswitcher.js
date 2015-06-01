/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    $('#comit-lang-selector').change(function(){
        var url=$(this).attr('data-url')+'?lang='+$(this).val();
        $.ajax({
            url: url,
            success: function(){
                window.location=document.URL;
            }
        });
    });
});