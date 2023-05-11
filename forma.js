
console.log("strada");

async function fetchPHP(event){
    event.preventDefault();
    const data = new FormData(event.target)
    console.log(data)
    const result = await fetch(event.target.action, {
        method: event.target.method,
        body: data,
    })
    const text = await result.json();
    console.log(text.latitude+" "+text.longitude+" at "+text.time+" temperature is "+text.temperature)
    const container=document.getElementById("results")
    let newElement = document.createElement('li')
    newElement=text.latitude+" "+text.longitude+" at "+text.time+" temperature is "+text.temperature+" °C \n";
    container.prepend(newElement)
}