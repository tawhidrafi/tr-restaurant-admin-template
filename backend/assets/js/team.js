//SECTION 
const uploadInput = document.querySelector('#default-btn'), //DEFAULT INPUT BUTTON
        uploadImg = document.querySelector('#ntm__img img'), //IMAGE FILE
        customBtn = document.querySelector('#custom-btn'),  //CUSTOM BUTTON FOR FILE INPUT
        cancelBtn = document.querySelector('#cancel-btn'),  //CANCEL BUTTON TO REMOVE FILE
        fileName = document.querySelector('#file-name');    //FILE NAME

//custom button event
customBtn.addEventListener('click', ()=>{
    uploadInput.click();
});
//preview the image
//showing file name
uploadInput.addEventListener('change', e =>{
    if(e.target.files.length > 0) {
        const url = URL.createObjectURL(e.target.files[0]); //geting the url of the photo
        uploadImg.src = url;    //setting the file src
        let fileTmpName = e.target.files[0].name; //geting the file name
        fileName.innerHTML = fileTmpName;   //showing the name of the file
        fileName.classList.add('file__item-show'); //display the cancel button
        cancelBtn.classList.add('file__item-show'); //display the cancel button
    }
});
//Cancel Button
cancelBtn.addEventListener('click', ()=>{
    uploadImg.src = ""; //remove the photo
    fileName.classList.remove('file__item-show'); //remove the filename
    cancelBtn.classList.remove('file__item-show'); //remove the cancel button
});