package formulario;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

public class EstudianteFrame extends JFrame {
    private TareaDAO tareaDAO;
    private JTextArea tareasTextArea;
    private Notificaciones notificaciones;
    private FiltrarTareas filtrarTareas;

    public EstudianteFrame() {
        setTitle("Interfaz del Estudiante");
        setSize(500, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        tareaDAO = new TareaDAO();
        tareasTextArea = new JTextArea(10, 30);
        notificaciones = new Notificaciones();

        List<Tarea> tareas = tareaDAO.obtenerTareas();
        filtrarTareas = new FiltrarTareas(tareas);
        
        for (Tarea tarea : tareas) {
            notificaciones.programarNotificacion(tarea.getFechaEntrega(), tarea.getDescripcion());
        }

        JPanel panel = new JPanel();
        panel.setLayout(new BoxLayout(panel, BoxLayout.Y_AXIS));

        JButton cargarTareasButton = new JButton("Cargar Tareas");
        cargarTareasButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    actualizarTareas(tareas);
                } catch (Exception ex) {
                    JOptionPane.showMessageDialog(null, "Error al cargar las tareas.");
                    ex.printStackTrace();
                }
            }
        });
        
        JButton loginButton = new JButton("Cerrar Sesion");
        loginButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                LoginFrame LoginFrame = new LoginFrame();
                LoginFrame.setVisible(true);
                dispose();
            }
        });

        panel.add(new JScrollPane(tareasTextArea));
        panel.add(cargarTareasButton);
        try {
            panel.add(filtrarTareas.crearPanel());
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null, "Error al crear el panel de filtrado de tareas.");
            ex.printStackTrace();
        }
        panel.add(loginButton);
        
        add(panel);
    }

    private void actualizarTareas(List<Tarea> tareas) {
        try {
            StringBuilder sb = new StringBuilder();
            for (Tarea tarea : tareas) {
                sb.append(tarea).append("\n");
            }
            tareasTextArea.setText(sb.toString());
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null, "Error al actualizar la lista de tareas.");
            ex.printStackTrace();
        }

    }
}