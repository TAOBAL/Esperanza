function getKey(id){
    if(id==1){
        id = "heels-and-wedges-collections";
    }else if(id==2){
        id = "flat-shoes-collections";
    }else if(id==3){
        id = "sandals-collections";
    }else if(id==4){
        id = "bags-and-african-fabrics";
    }
    window.location = 'collection.php?dsnj_oufg='+id;
}

function getAdminLink(ids){
    if(ids==5){
        ids = "blog";
    }else if(ids==6){
        ids = "users";
    }else if(ids==7){
        ids = "orders";
    }else if(ids==8){
        ids = "admin";
    }else if(ids==9){
        ids = "shoe";
    }else if(ids==10){
        ids = "contact_us";
    }else if(ids==11){
        ids = "ordering_details";
    }
    window.location = 'admin.php?pyeuf?_sdyu='+ids;
}

function whereTo(id) {
    var num = Math.floor((Math.random() * 1000000) + 1000000);
    window.location = 'details.php?ghei_oqid='+id;
}
function whereTo2(id) {
    var num = Math.floor((Math.random() * 1000000) + 1000000);
    window.location = 'addOrder.php?erty_noasd='+id;
}


    
  
