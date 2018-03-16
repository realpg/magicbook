var searching_province=$("#searching_province"),searching_city=$("#searching_city"),searching_town=$("#searching_town");
for(var i=0;i<provinceList.length;i++){
    addEle(searching_province,provinceList[i].name);
}
function addEle(ele,value){
    var optionStr="";
    optionStr="<option value="+value+">"+value+"</option>";
    ele.append(optionStr);
}
function removeEle(ele){
    ele.find("option").remove();
    var optionStar="<option value="+""+">"+"请选择"+"</option>";
    ele.append(optionStar);
}
var provinceText,cityText,cityItem;
searching_province.on("change",function(){
    provinceText=$(this).val();
    $.each(provinceList,function(i,item){
        if(provinceText == item.name){
            cityItem=i;
            return cityItem
        }
    });
    removeEle(searching_city);
    removeEle(searching_town);
    $.each(provinceList[cityItem].cityList,function(i,item){
        addEle(searching_city,item.name)
    })
});
searching_city.on("change",function(){
    cityText=$(this).val();
    removeEle(searching_town);
    $.each(provinceList,function(i,item){
        if(provinceText == item.name){
            cityItem=i;
            return cityItem
        }
    });
    $.each(provinceList[cityItem].cityList,function(i,item){
        if(cityText == item.name){
            for(var n=0;n<item.areaList.length;n++){
                addEle(searching_town,item.areaList[n])
            }
        }
    });
});