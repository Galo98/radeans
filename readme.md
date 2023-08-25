# radeans.com.ar (Notas)
---
# Codigos de CL
## CL = 1 Cierre de sesion
---
# Codigos de mensaje
## Admin
> 1 ==> ¡Genial! Se generaron los turnos correctamente. 

> 2 ==> ¡Error! No se generaron los turnos correctamente. 

> 3 ==> ¡Error! No se insertaron horarios para generar la grilla de turnos. 

> 4 ==> ¡Error! Se ha seleccionado el checkbox de limpiar campos a la vez de generar grilla. 

## Usuario

> 5 ==> Deberia redirigir a misturnos.php .

> 6 ==> ¡Error! No se pudo reservar el turno correctamente, intentalo nuevamente. 

> 7 ==> ¡Error! No se ha seleccionado una fecha para la reservacion del turno, seleccione una fecha. 

> 8 ==> ¡Error! Se ha seleccionado limpiar campos y reservar turnos a la vez. 

> 9 ==> Ya tienes un turno reservado para esa fecha y horario, intenta con otro.

> 10 ==> Turno cancelado con exito!

> 11 ==> No se pudo cancelar el turno, vuelva a intentarlo mas tarde.

---

# Return de verificarTurnos()

> Posicion 0 codigo de error = 9

> Posicion 1 codigo de error = fecha

> Posicion 2 codigo de error = servicio

> Posicion 3 codigo de error = prof_nombre

> Posicion 4 codigo de error = prof_apellido


