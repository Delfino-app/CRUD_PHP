import User from "../User/User.js"
import config from "./config.js"


const storage = (data) => {

    $.ajax({
        url:`${config.baseUrl}/storage`,
        method:'POST',
        data:data,
        success:function(response){

            User.responseSubmit(response, document.getElementById("displayInfo"));
        }
    })
}

const edit = (data,id) => {

    $.ajax({
        url:`${config.baseUrl}/edit/${id}`,
        method:'POST',
        data:data,
        success:function(response){
            
            User.responseSubmit(response,document.getElementById("displayInfo"));
        }
    })
}

const distroy = (id) => {

    $.ajax({
        url:`${config.baseUrl}/delete/${id}`,
        method:'DELETE',
        success:function(response){
            
            User.responseSubmit(response,document.getElementById("displayInfo"));
        }
    })
}

export default {storage,edit,distroy}