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

    // Excepción personalizada para la hora desincronizada
    public static class HoraInvalidaException extends Exception {
        public HoraInvalidaException(String mensaje) {
            super(mensaje);
        }
    }

    
    private void verificarHora() throws HoraInvalidaException {
        long horaLocal = System.currentTimeMillis();
        long horaUTC = System.currentTimeMillis(); 
        
        
        long diferencia = Math.abs(horaLocal - horaUTC);
        
        
        if (diferencia > 5 * 60 * 1000) {  
            throw new HoraInvalidaException("La hora del sistema está desincronizada con la hora global.");
        }
    }

    public void programarNotificacion(Date fechaEntrega, String tarea) {
        try {
            
            verificarHora();

            
            long fechaNotificacion = fechaEntrega.getTime() - (2 * 24 * 60 * 60 * 1000); // 2 días antes
            long tiempoRestante = fechaEntrega.getTime() - System.currentTimeMillis();

            
            if (tiempoRestante > 2 * 24 * 60 * 60 * 1000) {
                timer.schedule(new TimerTask() {
                    @Override
                    public void run() {
                        JOptionPane.showMessageDialog(null, "Tienes una tarea pendiente: " + tarea);
                    }
                }, new Date(fechaNotificacion));
            } else {
                JOptionPane.showMessageDialog(null, "La fecha de entrega es demasiado cercana o ya ha pasado: " + fechaEntrega);
            }
        } catch (HoraInvalidaException e) {
           
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
    }
}
