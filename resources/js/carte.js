class Carte {


    constructor(lines = []) {
        this.lines = lines;
    }


    addArticle(id) {
        var article= this.lines.find(article=>article.id==id)

        if (article) {
            article.quantity+=1
        }else{
            var line = { 'id':id, 'quantity': 1 }
            this.lines.push(line)
        }

    }

    removArticle(id) {
        if (this.lines != []) {
           var article= this.lines.find(e=>e.id==id)
                   if (article) {
                    if (article.quantity > 1) {
                        article.quantity -= 1
                    } else {
                        this.lines = this.lines.filter(element => element.id != id)
                    }

                }
        }

    }

}

var cardInst = new Carte([])
cardInst.addArticle(1)
cardInst.removArticle(1)
console.log(cardInst)

var butons = document.querySelectorAll(".add-to-carde")
console.log(butons)

butons.forEach(button => {
    button.addEventListener('click', (e) => {
        cardInst.addArticle(parseInt(e.target.id))
        console.log(cardInst)
    })


});

// butons.forEach(button => {
//     button.addEventListener('click', (e) => {
//         cardInst.addArticle(parseInt(e.target.id))
//         console.log(cardInst)
//     })


// });
