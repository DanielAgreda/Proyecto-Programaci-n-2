package formulario;

import javax.swing.*;
import java.util.Date;
import java.util.Timer;
import java.util.TimerTask;

public class Notificaciones {
    private Timer timer;

    public Notificaciones() {
        timer = new Timer(true);
    }

    public void programarNotificacion(Date fechaEntrega, String tarea) {
        // Calcular la fecha de notificación: 2 días antes de la fecha de entrega
        Date fechaNotificacion = new Date(fechaEntrega.getTime() - (2 * 24 * 60 * 60 * 1000)); // 2 días antes
        long tiempoRestante = fechaEntrega.getTime() - System.currentTimeMillis();
        
        // Verificar si la fecha de notificación es en el futuro
        if (tiempoRestante > 2 * 24 * 60 * 60 * 1000) {
            timer.schedule(new TimerTask() {
                @Override
                public void run() {
                    JOptionPane.showMessageDialog(null, "Tienes una tarea pendiente: " + tarea);
                }
            }, fechaNotificacion);
        } else {
            JOptionPane.showMessageDialog(null,"La fecha de entrega es demasiado cercana o ya ha pasado: " + fechaEntrega);
        }
    }
}