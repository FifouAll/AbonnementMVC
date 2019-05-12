$(()=>{
    $( "#promo" ).click(function() {
        if($( "#promo" ).is(':checked')) //$("#prix_m_p").is(":visible")
        {  
            $("#prix_m_p").show();
            $("#date_fin_p").show();
            $("#labelprix_m_p").show();
            $("#labeldate_fin_p").show();
        }
        else
        {
            $("#prix_m_p").hide();
            $("#date_fin_p").hide();
            $("#labelprix_m_p").hide();
            $("#labeldate_fin_p").hide();  
        }
    });
});