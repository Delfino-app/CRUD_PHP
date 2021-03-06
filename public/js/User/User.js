import routes from "../api/routes.js";
import ui from "./ui.js";

export default{
    type:null,
    async start(type){

        this.type = type; //new our edit

        await ui.getdefaultElements.call(this);
    },
    async validate(){

        const retorno = {status:200,message:"Ok"};

        if(this.type === "new"){
            if(this.password.value === ""){

                retorno.status = 400;
                retorno.message = "Informe a senha do usuário"
            }
        }

        if(this.e_mail.value === ""){

            retorno.status = 400;
            retorno.message = "Informe o e-mail do usuário"
        }

        if(this.nome.value === ""){

            retorno.status = 400;
            retorno.message = "Informe o nome do usuário"
        }

        return retorno;

    },
    async submitForm(e){

        e.preventDefault();

        const validate =  await this.validate();

        if(validate.status === 200){

            const data = {
                nome:this.nome.value,
                e_mail:this.e_mail.value,
                password:this.password.value,
            }

            if(this.data_de_nascimento.value != ""){

              data.data_de_nascimento = this.data_de_nascimento.value;
            }

            this.displayInfo.innerHTML = `
                <div class="alert alert-info" style="padding:5px 10px">
                   Aguarde...
                </div>
            `;

            try {

                (this.type === "new") ? routes.storage(data) :routes.edit(data,document.getElementById("user_reference").value);

            } catch (error) {

                this.displayInfo.innerHTML = `
                    <div class="alert alert-danger" style="padding:5px 10px">
                        Houve um erro inisperado. Por favor, tente mais tarde.
                    </div>
                `; 
            }
        }
        else{

            this.displayInfo.innerHTML = `
                <div class="alert alert-danger" style="padding:5px 10px">
                   ${validate.message}
                </div>
            `;
        }
    },
    async responseSubmit(response,display){

        if(response.status === "Ok"){

            display.innerHTML = `
                <div class="alert alert-success" style="padding:5px 10px">
                    ${response.message}
                </div>
            `;

            setTimeout(() =>{
                display.innerHTML = `
                    <div class="alert alert-info" style="padding:5px 10px">
                        Redirecionando...
                    </div>
                `;

                window.location.href="/";

            },1000)
        }
        else if(response.status === "Info"){

            display.innerHTML = `
                <div class="alert alert-info" style="padding:5px 10px">
                    ${response.message}
                </div>
            `; 
        }
        else{

            display.innerHTML = `
                <div class="alert alert-danger" style="padding:5px 10px">
                    Houves um erro inisperado. Por favor, tente mais tarde.
                </div>
            `; 
        }
    },
    //delete section
    async startDeleteSection(){

        ui.getDelteElements.call(this);
    },
    async deleteUser(user){

        $("#modalDelete .close").click();

        this.displayInfo.innerHTML = `
            <div class="alert alert-info" style="padding:5px 10px">
            Aguarde...
            </div>
        `;

        routes.distroy(user);
    }
}