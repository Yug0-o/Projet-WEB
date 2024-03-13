// $(document).ready(function(){
//   $('.news-carousel').slick({
//       autoplay: true, // Pour activer le défilement automatique
//       autoplaySpeed: 3000, // Délai entre chaque diapositive (en millisecondes)
//       dots: true, // Pour afficher les points de navigation
//       arrows: false, // Pour cacher les flèches de navigation
//       infinite: true, // Pour permettre le défilement infini
//       speed: 500, // Vitesse de transition (en millisecondes)
//       slidesToShow: 1, // Nombre de diapositives à afficher à la fois
//       slidesToScroll: 1 // Nombre de diapositives à faire défiler à la fois
//   });
// });


// Define the container and controller elements for the card carousel
const cardsContainer = document.querySelector(".card-carousel");
const cardsController = document.querySelector(".card-carousel + .card-controller")


// Class for handling dragging events
class DraggingEvent {
    // Constructor to set the target element for dragging events
    constructor(target = undefined) {
        this.target = target;
    }
    
    // Method to attach dragging event listeners
    event(callback) {
        let handler;
        
        this.target.addEventListener("mousedown", e => {
            e.preventDefault()
            
            handler = callback(e)
            
            window.addEventListener("mousemove", handler, { passive: true })
            
            document.addEventListener("mouseleave", clearDraggingEvent, { passive: true })
            
            window.addEventListener("mouseup", clearDraggingEvent, { passive: true })
            
            function clearDraggingEvent() {
                window.removeEventListener("mousemove", handler)
                window.removeEventListener("mouseup", clearDraggingEvent)
            
                document.removeEventListener("mouseleave", clearDraggingEvent)
                
                handler(null)
            }
        })
        
        this.target.addEventListener("touchstart", e => {
            handler = callback(e)
            
            window.addEventListener("touchmove", handler, { passive: true })
            
            window.addEventListener("touchend", clearDraggingEvent, { passive: true })
            
            document.body.addEventListener("mouseleave", clearDraggingEvent, { passive: true })
            
            function clearDraggingEvent() {
                window.removeEventListener("touchmove", handler)
                window.removeEventListener("touchend", clearDraggingEvent)
                
                handler(null)
            }
        }, {passive: true})
    }
    
    // Get the distance that the user has dragged
    getDistance(callback) {
        function distanceInit(e1) {
            let startingX, startingY;
            
            if ("touches" in e1) {
                startingX = e1.touches[0].clientX
                startingY = e1.touches[0].clientY
            } else {
                startingX = e1.clientX
                startingY = e1.clientY
            }
            

            return function(e2) {
                if (e2 === null) {
                    return callback(null)
                } else {
                    
                    if ("touches" in e2) {
                        return callback({
                            x: e2.touches[0].clientX - startingX,
                            y: e2.touches[0].clientY - startingY
                        })
                    } else {
                        return callback({
                            x: e2.clientX - startingX,
                            y: e2.clientY - startingY
                        })
                    }
                }
            }
        }
        
        this.event(distanceInit)
    }
}

// Class for the Card Carousel, extending the DraggingEvent class
class CardCarousel extends DraggingEvent {
    constructor(container, controller = undefined) {
        super(container)
        
        // DOM elements
        this.container = container
        this.controllerElement = controller
        this.cards = container.querySelectorAll(".card")
        
        // Ajoute une propriété pour suivre l'état du survol
        this.hovered = false;

        // Ajoute des écouteurs d'événements pour gérer le survol
        this.container.addEventListener("mouseenter", () => this.hovered = true, { passive: true });
        this.container.addEventListener("mouseleave", () => this.hovered = false, { passive: true });

        // Carousel data
        this.centerIndex = (this.cards.length - 1) / 2;
        this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100
        this.xScale = {};
        
        // Resizing
        window.addEventListener("resize", this.updateCardWidth.bind(this), { passive: true })
        
        if (this.controllerElement) {
            this.controllerElement.addEventListener("keydown", this.controller.bind(this), { passive: true })      
        }

        
        // Initializers
        this.build()
        
        // Bind dragging event
        super.getDistance(this.moveCards.bind(this))
    }
    
    updateCardWidth() {
        this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100
        
        this.build()
    }
    
    // Method to build the initial state of the carousel
    build(fix = 0) {
        const visibleCardsPercentage = 100;
        const visibleCardsScale = visibleCardsPercentage / 100;
        
        for (let i = 0; i < this.cards.length; i++) {
            const x = i - this.centerIndex;
            const scale = this.calcScale(x);
            const scale2 = this.calcScale2(x);
            const zIndex = -(Math.abs(i - this.centerIndex));
            
            const leftPos = this.calcPos(x, scale2);
            
            if (Math.abs(x) <= (this.cards.length - 1) * (1 - visibleCardsScale) / 2) {
                this.updateCards(this.cards[i], {
                    x: x,
                    scale: scale * visibleCardsScale,
                    leftPos: leftPos,
                    zIndex: zIndex
                });
            } else {
                this.updateCards(this.cards[i], {
                    x: x,
                    scale: scale,
                    leftPos: leftPos,
                    zIndex: zIndex
                });
            }  
            
            this.xScale[x] = this.cards[i];
        }
    }
    
    // Method to handle keyboard controls for card navigation
    controller(e) {
        const temp = {...this.xScale};
            
            if (e.keyCode === 39) {
                // Left arrow
                for (let x in this.xScale) {
                    const newX = (parseInt(x) - 1 < -this.centerIndex) ? this.centerIndex : parseInt(x) - 1;

                    temp[newX] = this.xScale[x]
                }
            }
            
            if (e.keyCode == 37) {
                // Right arrow
                for (let x in this.xScale) {
                    const newX = (parseInt(x) + 1 > this.centerIndex) ? -this.centerIndex : parseInt(x) + 1;

                    temp[newX] = this.xScale[x]
                }
            }
            
            this.xScale = temp;
            
            for (let x in temp) {
                const scale = this.calcScale(x),
                            scale2 = this.calcScale2(x),
                            leftPos = this.calcPos(x, scale2),
                            zIndex = -Math.abs(x)

                this.updateCards(this.xScale[x], {
                    x: x,
                    scale: scale,
                    leftPos: leftPos,
                    zIndex: zIndex
                })
            }
    }
    
    // Method to calculate card position based on scale
    calcPos(x, scale) {
        let formula = 100 - (scale * 100 + this.cardWidth) / 2;
        
        if (x < 0) {
            formula = (scale * 100 - this.cardWidth) / 2;
        } else if (x > 0) {
            formula = 100 - (scale * 100 + this.cardWidth) / 2;
        }
        
        return formula * 2.2 - 24;
    }
    
    // Method to update card styling based on data
    updateCards(card, data) {
        if (data.x || data.x == 0) {
            card.setAttribute("data-x", data.x)
        }
        
        if (data.scale || data.scale == 0) {
            card.style.transform = `scale(${data.scale})`

            if (data.scale == 0) {
                card.style.opacity = data.scale
            } else {
                card.style.opacity = 1;
            }
        }
     
        if (data.leftPos) {
            card.style.left = `${data.leftPos}%`        
        }
        
        if (data.zIndex || data.zIndex == 0) {
            if (data.zIndex == 0) {
                card.classList.add("highlight")
            } else {
                card.classList.remove("highlight")
            }
            
            card.style.zIndex = data.zIndex  
        }
    }
    
    // Method to calculate scale for animation
    calcScale2(x) {
        let formula;
     
        if (x <= 0) {
            formula = 1 - -1 / 5 * x
            
            return formula
        } else if (x > 0) {
            formula = 1 - 1 / 5 * x
            
            return formula
        }
    }
    
    // Method to calculate scale for card transformation
    calcScale(x) {
        const formula = 1 - 1 / 5 * Math.pow(x, 2)
        
        if (formula <= 0) {
            return 0 
        } else {
            return formula      
        }
    }
    
    // Method to check and update card ordering
    checkOrdering(card, x, xDist) {    
        const original = parseInt(card.dataset.x)
        const rounded = Math.round(xDist)
        let newX = x
        
        if (x !== x + rounded) {
            if (x + rounded > original) {
                if (x + rounded > this.centerIndex) {
                    
                    newX = ((x + rounded - 1) - this.centerIndex) - rounded + -this.centerIndex
                }
            } else if (x + rounded < original) {
                if (x + rounded < -this.centerIndex) {
                    
                    newX = ((x + rounded + 1) + this.centerIndex) - rounded + this.centerIndex
                }
            }
            
            this.xScale[newX + rounded] = card;
        }
        
        const temp = -Math.abs(newX + rounded)
        
        this.updateCards(card, {zIndex: temp})

        return newX;
    }
    
    // Method to move cards during dragging
    moveCards(data) {
        let xDist;
        
        if (data != null) {
            this.container.classList.remove("smooth-return")
            xDist = data.x / 250;
        } else {

            
            this.container.classList.add("smooth-return")
            xDist = 0;

            for (let x in this.xScale) {
                this.updateCards(this.xScale[x], {
                    x: x,
                    zIndex: Math.abs(Math.abs(x) - this.centerIndex)
                })
            }
        }

        for (let i = 0; i < this.cards.length; i++) {
            const x = this.checkOrdering(this.cards[i], parseInt(this.cards[i].dataset.x), xDist),
                        scale = this.calcScale(x + xDist),
                        scale2 = this.calcScale2(x + xDist),
                        leftPos = this.calcPos(x + xDist, scale2)
            
            
            this.updateCards(this.cards[i], {
                scale: scale,
                leftPos: leftPos
            })
        }
    }

    // Method to automatically slide cards at regular intervals
        autoSlide() {
                setInterval(() => {
                    if (!this.hovered) {
                        requestAnimationFrame(() => {
                                const temp = { ...this.xScale };

                                for (let x in this.xScale) {
                                        const newX = parseInt(x) - 1;

                                        if (newX < -this.centerIndex) {
                                                temp[this.centerIndex] = this.xScale[x];
                                        } else {
                                                temp[newX] = this.xScale[x];
                                        }
                                }

                                this.xScale = temp;

                                for (let x in temp) {
                                        const scale = this.calcScale(x),
                                                scale2 = this.calcScale2(x),
                                                leftPos = this.calcPos(x, scale2),
                                                zIndex = -Math.abs(x);

                                        this.updateCards(this.xScale[x], {
                                                x: x,
                                                scale: scale,
                                                leftPos: leftPos,
                                                zIndex: zIndex,
                                        });
                                }
                        });
                    }
                }, 5000); // 5000 milliseconds = 5 seconds
        }
}

// Initialize the card carousel and bind the dragging event
const carousel = new CardCarousel(cardsContainer);
carousel.autoSlide();