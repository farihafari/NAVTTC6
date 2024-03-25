function num(numbers){
    document.querySelector("#inp").value +=numbers
    }
    function op(operators){
    document.querySelector("#inp").value +=operators;

    }
    function operations(){
    
    let result =  eval(document.querySelector("#inp").value);
    document.querySelector("#inp").value=result;
    }
    function clearAll(){
    document.querySelector("#inp").value="";

    }