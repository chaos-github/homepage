<!DOCTYPE html>
<html>
<head>
<?php
echo 123;
?>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
<link href="mypage.css" rel="stylesheet">
<body>
  <div id="wrapper">
    <div id="myResume" v-cloak>
      <h2 align="center" v-once>{{welcomeMessage}}</h2>
      <p align="center" v-once>{{today}}</p>
      <div id="intro" >
        <img :src="profilePic" alt="This is me !!" >
        <div>
          <h3 v-text="aboutme.p0"></h3>
          <p>{{aboutme.p1}}</p>
          <p>{{aboutme.p2}}</p>
          <span v-html="aboutme.p3"></span>
        </div>
      </div> 
      <div id="secEducation" >
        <div>
          <h3 align="center">Education</h3>
          <div>
            <span>{{Education.highSchool.name}}</span><span>{{Education.highSchool.start}}~{{Education.highSchool.end}}</span>
          </div>
          <div>
            <span>{{Education.University.name}}</span><span>{{Education.University.start}}~{{Education.University.end}}</span>
          </div>
          <div>
            <span>{{Education.masterDegree.name}}</span><span>{{Education.masterDegree.start}}~{{Education.masterDegree.end}}</span>
          </div>
        </div>
      </div> 
    </div>
    <!-- 
    <div id="secWork" >
      
      <div v-cloak>
        <p>{{message}}</p>
        <p>{{aboutme.p1}}</p>
        <p>{{aboutme.p2}}
          {{aboutme.p3}}</p>
      </div>
      
    </div> 
    <div id="secProject" >
      
      <div v-cloak>
        <p>{{message}}</p>
        <p>{{aboutme.p1}}</p>
        <p>{{aboutme.p2}}
          {{aboutme.p3}}</p>
      </div>
    </div>  -->
  </div>
</body>
<script>
  let complete = 0
  let data = {
            message: '',
            welcomeMessage : 'Welcome to my VueResume',
            profilePic :'./pic/me.jpg',
            // today: new Date().toDateString(),
            aboutme: {
              p0 :'' ,
              p1 :'' ,
              p2 :'' ,
              p3 :''
            },
            Education:{
              highSchool:{
                name:'Nanhu senior highschool',
                start:'2003/09',
                end:'2006/07'
              },
              University:{
                name:'Fujen Catholic Unerversity',
                start:'2006/09',
                end:'2010/07'
              },
              masterDegree:{
                name:'National ChunCheng Unerversity',
                start:'2010/09',
                end:'2012/07'
              }
            }
          }
  
  let vm = new Vue({
          el:'#myResume',
          data,
          computed : {
            today : function(){
              return 'Today is '+new Date().toDateString()
            }
          }
  })
  // let vmEdu = new Vue({
  //         el:'#secEducation',
  //         data:{
  //           Education:{
  //             highSchool:{
  //               name:'Nanhu senior highschool2',
  //               start:'2003/09',
  //               end:'2006/07'
  //             },
  //             University:{
  //               name:'Fujen Catholic Unerversity',
  //               start:'2006/09',
  //               end:'2010/07'
  //             },
  //             masterDegree:{
  //               name:'National ChunCheng Unerversity',
  //               start:'2010/09',
  //               end:'2012/07'
  //             }
  //           }
  //         }
  // })

  function IntroDynamic(){
    let index = 0
    let aryInd = 0
    let introSpeed = 50
    let aboutMe = [ 'Introduction:',
                    'Hi, my name is CHAO-AN MIU.',
                    'I???m modest, amiable, persevering and responsible. I always took cautious and meticulous attitude to work.',
                    '<p style="font-size:20px; color:red;">Phone: 0988-923-512. LINE: miau628 E-mail: miau_628@hotmail.com.</p>']
                    
    var dynamicString = setInterval(()=>{ 
      data.aboutme.p0 = aboutMe[aryInd].substr(0, index);
      if(aboutMe[aryInd].length == index){
        index = 0
        aryInd++
        clearInterval(dynamicString)
        //-----------------------------------
        {
          dynamicString = setInterval(()=>{
            data.aboutme.p1 = aboutMe[aryInd].substr(0, index);
            if(aboutMe[aryInd].length == index){
              index = 0
              aryInd++
              clearInterval(dynamicString)
              //-----------------------------------
              {
                dynamicString = setInterval(()=>{
                  data.aboutme.p2 = aboutMe[aryInd].substr(0, index);
                  if(aboutMe[aryInd].length == index){
                    index = 0
                    aryInd++
                    clearInterval(dynamicString)
                    // -----------------------------------
                    {
                      setTimeout(()=>{                                              
                          data.aboutme.p3 = aboutMe[aryInd]
                          complete = 1
                      },1000)
                    } 
                    // -----------------------------------
                  }else
                  index++  
                },introSpeed)
              } 
              //-----------------------------------
            }else
            index++  
          },introSpeed)
        }
        //-----------------------------------
      }else
        index++  
    },introSpeed)
  }
  
  function EduSecDynamic(){
    setTimeout(()=>{
       complete = 1
    },2000)
  }

  function WorkDynamic(){
    setTimeout(()=>{
       complete = 1
    },2000)
  }

  function ProjectDynamic(){
    setTimeout(()=>{
       complete = 1
    },2000)
  }

  new Promise((resolve,reject)=>{
    IntroDynamic()
    let check = setInterval(()=>{ 
      if(complete == 1){
        clearInterval(check) 
        resolve('Dynamic introduction complete !!')
      }
    },100)
    console.log('wait a second')
  }).then(function(str){
    console.log(str)
    EduSecDynamic()
    return checkComplete('EduSecDynamic')
  }).then(function(str){
    console.log(str)
    WorkDynamic()
    return checkComplete('WorkDynamic')
  }).then(function(str){
    console.log(str)
    ProjectDynamic()
    return checkComplete('ProjectDynamic')
  }).then(function(str){
    console.log(str)
    console.log('All complete !!!!!')
  }).catch(function(){  
    console.log('Dynamic went wrong.')
  })

  function checkComplete(secName){
    complete = 0
    return new Promise((resolve,reject)=>{
              setInterval(()=>{
                if(complete) resolve(secName + ' Complete !!')
              },1000)       
            })
  }
  
  
  // function clearAllIntervals(){
  //   for(let i=0; i<100; i++)
  //   {
  //     window.clearInterval(i);
  //   }
  // }
  // let dynamicString2 = setInterval(function abc(){
  //   data.aboutme.p1 = aboutmeP1.substr(0, index2);
  //   if(aboutmeP1.length == index2)
  //     clearInterval(dynamicString2)
  //   else
  //     index2++  
  // },100)

  // let dynamicString3 = setInterval(function abc(){
  //   data.aboutme.p2 = aboutmeP2.substr(0, index3);
  //   if(aboutmeP2.length == index3)
  //     clearInterval(dynamicString3)
  //   else
  //     index3++  
  // },100)
  
  // new Vue({
  //         el:'#secEducation',
  //         data:{
  //           message: 'My education',
  //           highSchool: {
  //             name: 'Nanhu senior high school',
  //             start:'2003/09',
  //             end: '2006/06'
  //           },
  //           university: {
  //             name:'Fujen catholic university',
  //             start:'2006/09',
  //             end: '2010/06'
  //           }
  //          }
  // })
  // new Vue({
  //         el:'#secWork',
  //         data:{
  //           message: 'Work experience',
  //           company_1: {
  //             name: 'America megatrends',
  //             start:'2013/10',
  //             end: '2018/02'
  //           },
  //           company_2: {
  //             name:'PCHOME store',
  //             start:'2018/07',
  //             end: '2022/10'
  //           }
  //         }
  // })
  // new Vue({
  //         el:'#secProject',
  //         data:{
  //           message: 'Hello!!  welcome to my page !!',
  //           today: new Date().toDateString(),
  //           aboutme: 'My name is Chao-An Miu , here is my coding resume , hope I can do something special.'
  //         }
  // })
  // // $(function(){
  //   try{
  //     setTimeout( () => {
      
  //     },3000)
  //   }catch(e){
  //     console.log(e.message);
  //   }
  // })
  
  </script>
</html>