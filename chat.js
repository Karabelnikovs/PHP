
async function FetchPHP(event){
    event.preventDefault();
    const data = new FormData(event.target)
    console.log(data)
    const result = await fetch(event.target.action, {
        method: event.target.method,
        body: data,
    })
    const text = await result.json()
    console.log(text);
    // const container=document.getElementById("chats")
    // let newElement = document.createElement('li')
    
    // newElement.innerHTML=text.nickname+" at "+text.time+": "+text.chat;
    // container.prepend(newElement)
    const container=document.getElementById("chats")
    container.innerHTML="";
    text.forEach(element => {
        let newElement = document.createElement('li')

        newElement.innerHTML=element.nickname+" at "+element.time+": "+element.chat.replaceAll("\n","<br>");
        container.prepend(newElement)
    });
}

