
export default{

    getdefaultElements(){

        this.nome = document.getElementById("nome");
        this.e_mail =  document.getElementById("e_mail");
        this.password =  document.getElementById("password");
        this.data_de_nascimento = document.getElementById("data_de_nascimento");

        this.formulario = document.getElementById("formulario"); 
        this.formulario.onsubmit = (e) => this.submitForm(e);
    
        this.displayInfo = document.getElementById("displayInfo");
    },
    getDelteElements(){

        this.displayInfo = document.getElementById("displayInfo");

        let reference = 0;

        $('.btn-delete-user').click(function(){

            reference =  $(this).attr("reference");
        });

        (document.getElementById("btnDeleteModal") != null ) ? document.getElementById("btnDeleteModal").onclick = () => this.deleteUser(reference) :null;
    }
}