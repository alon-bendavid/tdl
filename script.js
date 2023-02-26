// document.addEventListener('DOMContentLoaded', function() {
  //////////////////////////////////////////////////////////////////////
  ///////////////////////selction of program////////////////////////////
  //////////////////////////////////////////////////////////////////////







  

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
 
  
  ////////////////////////////////////////////////////////////////////////////////
  ///////////////////////handling the tasks //////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////
  
  const tasksForm = document.getElementById("handle_tasks_form");
  const task_list = document.getElementById("task_list");
const task_done = document.getElementById("task_done");



tasksForm.addEventListener("submit" , (e)=>{
  e.preventDefault();
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');
    const taskCreatedTime = document.querySelector('#taskCreatedTime');
    taskCreatedTime.value = formattedDate;

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
        
 
        let  block = document.createElement("div");
        
        block.classList.add("block","div"+task.id);
        // const targetBlock = document.querySelector("."+"div"+task.value)
        // console.log(targetBlock);
        const taskInfo = document.createElement("p");
        taskInfo.innerHTML= task.task ; 
       
        const taskDate = document.createElement("p");
        taskDate.innerHTML= "created At- " + task.date ;
      let btnsDiv = document.createElement("div");
      btnsDiv.classList.add("btnsDiv");
      
      /////delete button
      delTask = document.createElement("button");
      delTask.innerHTML = "Delete Task";
      delTask.setAttribute("value", task.id);
      // delTask.setAttribute("value", "task"+task.id);

      delTask.classList.add("delBtn");
      
      /////done button
      doneTask = document.createElement("button");
      doneTask.innerHTML = "Task Done";
      doneTask.setAttribute("value", task.id);
      doneTask.classList.add("doneBtn");

      
      const curDiv = document.querySelector("."+"div" + task.id);
      if (!task_done.contains(curDiv)){
        block.appendChild(taskInfo)
      block.appendChild(taskDate)
      block.appendChild(btnsDiv);
      btnsDiv.appendChild(delTask);
      btnsDiv.appendChild(doneTask);
      task_list.appendChild(block);
      console.log(curDiv);
      }

  });
// console.log(task_list);

  const doneBtns = document.querySelectorAll("."+"doneBtn");
  //this code allow click the done btns and delete the current div from the list and move it to the done list
  doneBtns.forEach(btn=> {
    btn.addEventListener("click",()=>{
      console.log(btn.value);
      const thisDiv = document.querySelector("."+"div"+btn.value);
      console.log(thisDiv);
      task_list.removeChild(thisDiv);
      task_done.appendChild(thisDiv);
      thisDiv.style. background = 'rgb(60, 179, 235)';
      
    }) 
    
  });        
  const delBtns = document.querySelectorAll(".delBtn");

  delBtns.forEach(delBtn => {
    delBtn.addEventListener("click", async () => {
      const taskId = delBtn.value;
      // console.log(taskId);
  
      const formData = new FormData();
      formData.append('taskId', taskId);
  
      const response = await fetch('./php/deleteTask.php', {
        method: 'POST',
        body: formData
      });
  
      const data = await response.text();
      console.log(data);
if (data == "task deleted"){
  const thisDiv = document.querySelector("."+"div"+delBtn.value);
   
  ifElmentExist_delete(task_list , thisDiv);
  ifElmentExist_delete(task_done , thisDiv);



}
    });
  });
  ////////////////////////////////marking the task as done////////////
  return data;
} catch (error) {
  console.error(error);
}

}
// delBtn.addEventListener("click",async ()=>{
  


    
    //   // toInt = delBtn.match(/\d+/)[0] ;
    //   console.log( toInt);
      
    //   const response =  await fetch('./php/deleteTask.php',{
        
    //     method: 'POST',
    //     body: taskID
        
    //   });
    //   const data = await response.text();
    //   console.log(data);
      
    // });
    
  
  // async function deleteTask(taskID){
  //   console.log(taskID);
  //   toInt = taskID.match(/\d+/)[0] ;
  //   console.log( toInt);
    
  //   const response =  await fetch('./php/deleteTask.php',{
      
  //     method: 'POST',
  //     body: taskID
      
  //   });
  //   const data = await response.text();
  //   console.log(data);
    
  // }
  // check if an elment exist inside the lsit
  function ifElmentExist_delete(perent , child){

    if (perent.contains(child)){
      console.log("its inside tasklist");
      perent.removeChild(child);
    }
  }
  
  fetch_All_Tasks();
  console.log(task_list);

