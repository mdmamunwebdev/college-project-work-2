const  DragArea = document.querySelector(".AppBody"),
       DragText = DragArea.querySelector("h3");

const  button = document.getElementById("imgUploadBtn");
const  input  = document.getElementById("prdoductImage");
let Myfile ;


input.addEventListener("change" ,function(){
    Myfile = this.files[0];
    DragArea.classList.add("active");

    showFile()
})

DragArea.addEventListener("dragover", (event)=> {
    event.preventDefault();
    DragArea.classList.add("active");

    DragText.textContent = "Release to Upload File";
})

DragArea.addEventListener("dragleave",  ()=> {
    DragArea.classList.remove("active");
    DragText.textContent = "Drag & Drop";
});


DragArea.addEventListener("drop", (event)=>{
    event.preventDefault();
    Myfile = event.dataTransfer.files[0];

    showFile()
})


function showFile(){
    let filetype = Myfile.type
    let VaildEx = ["image/jpeg", "image/jpg", "image/png"];
    if(VaildEx.includes(filetype)){
        let fileReader = new  FileReader();
        fileReader.onload = () => {
            let FileUrl  = fileReader.result;
            let img = `<img src="${FileUrl}" alt="">`;
            DragArea.innerHTML = img
        }
        fileReader.readAsDataURL(Myfile)
    }
    else {
        alert("Please Upload Jpg Or Png Formet ");
        DragArea.classList.remove("active");
        DragText.textContent = "Drag & Drop"
    }
}



