package formulario;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

public class FiltrarTareas {
    private List<Tarea> tareas;
    private JComboBox<String> filtroComboBox;
    private JTextArea tareasTextArea;

    public FiltrarTareas(List<Tarea> tareas) {
        this.tareas = tareas;
        filtroComboBox = new JComboBox<>(new String[]{"Estado", "Fecha", "Materia"});
        tareasTextArea = new JTextArea(10, 30);

        filtroComboBox.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                actualizarTareas();
            }
        });
    }

    public JPanel crearPanel() {
        try {
            JPanel panel = new JPanel();
            panel.setLayout(new BorderLayout());

            panel.add(filtroComboBox, BorderLayout.NORTH);
            panel.add(new JScrollPane(tareasTextArea), BorderLayout.CENTER);

            return panel;
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Error al crear el panel de filtrado de tareas.");
            e.printStackTrace();
            return new JPanel(); // Return an empty panel as a fallback
        }

    }

    private void actualizarTareas() {
        try {
            String filtro = (String) filtroComboBox.getSelectedItem();
            
            if (filtro == null || filtro.isEmpty()) {
                JOptionPane.showMessageDialog(null, "Error: No se seleccionó ningún criterio de filtrado.");
                return;
            }

            
            List<Tarea> tareasFiltradas = filtrarPorCriterio(filtro);
            StringBuilder sb = new StringBuilder();
            for (Tarea tarea : tareasFiltradas) {
                sb.append(tarea).append("\n");
            }   

            tareasTextArea.setText(sb.toString());
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Error al actualizar la lista de tareas.");
            e.printStackTrace();
        }
    }

    private List<Tarea> filtrarPorCriterio(String criterio) {
        List<Tarea> tareasFiltradas = new ArrayList<>(tareas);
        try {
            switch (criterio) {
                case "Estado":
                    tareasFiltradas.sort(new Comparator<Tarea>() {
                        @Override
                        public int compare(Tarea t1, Tarea t2) {
                            return determinarPrioridad(t1) - determinarPrioridad(t2);
                        }
                    });
                    break;
                case "Fecha":
                    tareasFiltradas.sort(new Comparator<Tarea>() {
                        @Override
                        public int compare(Tarea t1, Tarea t2) {
                            return t1.getFechaEntrega().compareTo(t2.getFechaEntrega());
                        }
                    });
                    break;
                case "Materia":
                    tareasFiltradas.sort(new Comparator<Tarea>() {
                        @Override
                        public int compare(Tarea t1, Tarea t2) {
                            return t1.getMateria().compareTo(t2.getMateria());
                        }
                    });
                    break;
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, "Error al filtrar tareas por el criterio seleccionado.");
            e.printStackTrace();
        }
        return tareasFiltradas;
    }

    private int determinarPrioridad(Tarea tarea) {
        try {
            long tiempoRestante = tarea.getFechaEntrega().getTime() - System.currentTimeMillis();
            if (tiempoRestante <= 24 * 60 * 60 * 1000) { // Menos de 24 horas
                return 1; // Crítico
            } else if (tiempoRestante <= 3 * 24 * 60 * 60 * 1000) { // Menos de 3 días
                return 2; // Urgente
            } else if (tiempoRestante <= 7 * 24 * 60 * 60 * 1000) { // Menos de una semana
                return 3; // Normal
            } else {
                return 4; // Bajo control
            }
        } catch (NullPointerException e) {
            JOptionPane.showMessageDialog(null, "Error: Fecha de entrega de la tarea no válida o no disponible.");
            e.printStackTrace();
            return 4; // Default priority
        }

    }
}