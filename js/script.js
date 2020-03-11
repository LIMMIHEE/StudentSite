

function Login(){
    if( document.documentElement.clientWidth >834){
        document.getElementById('login').style.left = "5vmin";
        document.getElementById('Registration').style.left =  "50vmin";
        document.getElementById('btn').style.left = "0vmin";
        document.getElementById('btn').style.marginTop= "0vmin";

    }else{
        document.getElementById('login').style.left = "5vmin";
        document.getElementById('Registration').style.left =  "50vmin";
        document.getElementById('btn').style.marginTop= "0vmin";
    }
}

function Registr(){
    if(document.documentElement.clientWidth >834){
        document.getElementById('login').style.left = "-50vmin";
        document.getElementById('Registration').style.left =  "5vmin";
        document.getElementById('btn').style.left = "14vmin";
        document.getElementById('btn').style.marginTop= "0vmin";
    }else{
        document.getElementById('login').style.left = "-50vmin";
        document.getElementById('Registration').style.left =  "5vmin";
        document.getElementById('btn').style.marginTop = "5.2vmin";
    }
}

let MeneTrueFalse =0;
let MeneTrueFalseText ='';
function MenuOpenClose(){
    MeneTrueFalse ++;
    MeneTrueFalse%2==0 ? MeneTrueFalseText='none' : MeneTrueFalseText='block';
 
    let Mene = document.getElementsByClassName('Menu-bar');
        for(var i=0; i<Mene.length; i++){
            Mene[i].style.display=MeneTrueFalseText;
    }
}