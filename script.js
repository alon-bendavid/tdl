// document.addEventListener('DOMContentLoaded', function() {
  ////////////////////////////////////////////////////////////////////////////////
  ///////////////////////handling the inscription form////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////
    const form = document.getElementById("signUp");
    const signMsg = document.getElementById("signMsg");
    // console.log(form);
    
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const payLoad = new FormData(form);
      
      for (item of payLoad) {
        console.log(item[0], item[1]);    
      }  
      //start the async function to fetch the data
      postData(payLoad); 
    })
    // });
    async function postData(payLoad){
//fetching the data
      const response = await fetch('./php/inscription.php',{
          method: 'POST',
          body: payLoad
      });
//since i use echo i need to handle the response with text method
      const data = await response.text();
      if (data == "user created"){
        signMsg.innerHTML = "User successfully created";
      }
      else{
        signMsg.innerHTML = "User creation failed";

      }
      // print out the values i sent to the backend-side
      console.log(data);
  }


  ////////////////////////////////////////////////////////////////////////////////
  ///////////////////////handling the connexon //////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////

  const connexionForm = document.getElementById("connexion");
const conMsg = document.getElementById("conMsg");

  connexionForm.addEventListener("submit" , (e)=>{
e.preventDefault();
//fetch the data from the form

const connexionData = new FormData(connexionForm);

for (const item of connexionData) {
  console.log(item[0], item[1]);
}
fetchConnexion(connexionData);
 })

 async function fetchConnexion(connexionData){

  const response = await fetch("./php/connexion.php",{

    method: 'POST',
    body: connexionData
  }); 
    
const data = await response.text();
console.log(data);
if(data == "connected"){
  window.location.reload();
  // conMsg.innerHTML = "connected";

}
if(data == "something went worng"){
  conMsg.innerHTML = "Login failed";
}

  }
  ////////diconnect////////
  // const disconnectBtn = document.getElementById("disconnectBtn");

  // disconnectBtn.addEventListener("click" , ()=>{
  //   window.location.reload();


  // })
  
  
  ////////////////////////////////////////////////////////////////////////////////
  ///////////////////////handling the tasks //////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////
  
  const tasksForm = document.getElementById("handle_tasks_form");
  const task_list = document.getElementById("task_list");



  tasksForm.addEventListener("submit" , (e)=>{

e.preventDefault();
const taskPayload = new FormData(tasksForm);
taskPayload.forEach(item => {
  // console.log(item);
});
//upload the text and then fetch it
fetchTask(taskPayload);
fetch_All_Tasks();

})

async function fetchTask(taskPayload){
  
  const response =  await fetch('./php/handleTasks.php',{
    
    method: 'POST',
    body: taskPayload
    
  });
  const data = await response.text();
  // console.log(data);
  
}
// })

  
  async function fetch_All_Tasks() {
    try {
      const response = await fetch(`./php/todolist.php`);
      const data = await response.json();
      console.log(data);
      task_list.innerHTML = "";
    //take each json object fetched from the DB and present it in the DOM
      data.forEach(task => {


      block = document.createElement("div");

      block.classList.add("block");
      // console.log(block);
      block.innerHTML=task.task ;
/////delete button
    delTask = document.createElement("button");
    delTask.innerHTML = "Delete Task";
    delTask.setAttribute("value", task.id);
   
    /////done button
    doneTask = document.createElement("button");
    doneTask.innerHTML = "Mark As Done";
    doneTask.setAttribute("value", task.id);
    // console.log(delTask);
    // console.log(doneTask);
    
    
    block.appendChild(delTask);
    block.appendChild(doneTask);
    
    
    item = document.createElement("li")
    item.classList.add("task");
    
    //insert the elements into the dom
    task_list.appendChild(block);
    block.appendChild(item);
    
    
  });
  const doneBtns = document.querySelectorAll(".block");
  doneBtns.forEach(div=> {
    console.log(div);
    div.addEventListener("click",()=>{
div.style.display = 'none';
    }) 
  });        
  return data;
} catch (error) {
  console.error(error);
}

  }
fetch_All_Tasks();

// function TaskDone(task){
// const.

// }

// console.log(fetch_All_Tasks());

// const data =  fetch_All_Tasks();
// const tasksFormBtn = document.getElementById("tasksFormBtn");
// const tasks = Array()
// tasksFormBtn.addEventListener("click" , (data)=>{

//   data.forEach(item => {
//     console.log(item);
//   });

// })

// showTasks(data);
// console.log(data);

// async function showTasks(data){

//   data.forEach(task => {
     
          
//     item = document.createElement("li")
//    item.classList.add("task");
//    item.innerHTML=task.task +" "+ task.date;
//    task_list.appendChild(item);
  
  
//   });
// }