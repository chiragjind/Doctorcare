const prevbtn= document.querySelector('#prevbtn')
const nextbtn= document.querySelector('#nextbtn')
const book = document.querySelector('#book')
const front3 = document.getElementById('front3')
const paper1 = document.querySelector('#pg1')
const paper2 = document.querySelector('#pg2')
const paper3 = document.querySelector('#pg3')
const front = document.getElementsByClassName('front');
const back = document.getElementsByClassName('back');
const arrayf = Array.from(front);
const arrayb = Array.from(back);
  

arrayf.map((ele)=>{
    ele.addEventListener('click',()=>{nextbook()});
})
arrayb.map((ele)=>{
    ele.addEventListener('click',()=>{prevbook()});
})

console.log(front3)
front3.addEventListener('click',()=>{nextbook()});



prevbtn.addEventListener('click',()=>{prevbook()});
nextbtn.addEventListener('click',()=>{nextbook()});

let currentpage = 1;
let numofpaper= 3;
let maxlocation = numofpaper +1;

const openbook =()=>{
 book.style.transform = 'translateX(50%)'
 prevbtn.style.transform = 'translateX(-100px)'
 nextbtn.style.transform = 'translateX(100px)'
    
}
const closebook =(isatbegin)=>{
    if(isatbegin){

        book.style.transform = 'translateX(0%)'
    }else{

        book.style.transform = 'translateX(100%)'
    }
 prevbtn.style.transform = 'translateX(0px)'
 nextbtn.style.transform = 'translateX(0px)'
}
const nextbook =()=>{
    if(currentpage<maxlocation){
        switch(currentpage){
            case 1:
                openbook();
                paper1.classList.add('flipped')
                paper1.style.zIndex=1;
                break;
            case 2:
                paper2.classList.add('flipped')
                paper2.style.zIndex=2;
                break;
            case 3:
                paper3.classList.add('flipped')
                paper3.style.zIndex=3;
                closebook(false);
                break;
                default:
                    throw new Error('unknow state')
        }
        currentpage++;
    }

}
const prevbook =()=>{
    if(currentpage>1){
        switch(currentpage){
            case 2:
                closebook(true);
                paper1.classList.remove('flipped')
                paper1.style.zIndex=3;
                break;
            case 3:
                paper2.classList.remove('flipped')
                paper2.style.zIndex=2;
                break;
            case 4:
                openbook();
                paper3.classList.remove('flipped')
                paper3.style.zIndex=1;
                break;
                default:
                    throw new Error('unknow state')
        }
        currentpage--;
    }
}