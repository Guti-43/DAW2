const coche = {
    velocidad: 0,
    acelerar: function(vel){
            this.velocidad += vel;
        },
    frenar: function(vel){
            this.velocidad -= vel;
        },
    mostrarVel: function(){
            console.log(this.velocidad)
        }
}