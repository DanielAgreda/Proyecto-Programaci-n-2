package formulario;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Date;
import java.util.ArrayList;
import java.util.List;

public class DocenteFrame extends JFrame {
    private JTextField descripcionField;
    private JComboBox<String> estadoBox;
    private JTextField fechaEntregaField;
    private JComboBox<String> materiaBox;
    private JTextField nuevaMateriaField;
    private JButton agregarMateriaButton;
    private TareaDAO tareaDAO;
    private List<String> materias;

    public DocenteFrame() {
        setTitle("Interfaz del Docente");
        setSize(500, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        tareaDAO = new TareaDAO();
        materias = new ArrayList<>();

        JPanel panel = new JPanel();
        panel.setLayout(new BoxLayout(panel, BoxLayout.Y_AXIS));

        descripcionField = new JTextField();
        estadoBox = new JComboBox<>(new String[]{"Pendiente", "En Proceso", "Completada"});
        fechaEntregaField = new JTextField();
        materiaBox = new JComboBox<>();
        nuevaMateriaField = new JTextField();
        agregarMateriaButton = new JButton("Agregar Materia");

        // Acción del botón para agregar nueva materia
        agregarMateriaButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    String nuevaMateria = nuevaMateriaField.getText();
                    if (!nuevaMateria.isEmpty() && !materias.contains(nuevaMateria)) {
                        materias.add(nuevaMateria);
                        materiaBox.addItem(nuevaMateria);
                        nuevaMateriaField.setText("");
                        JOptionPane.showMessageDialog(null, "Materia agregada exitosamente");
                    } else {
                        JOptionPane.showMessageDialog(null, "La materia ya existe o el campo está vacío");
                    }
                } catch (Exception ex){
                    JOptionPane.showMessageDialog(null, "Ocurrió un error al agregar la materia.");
                    ex.printStackTrace();
                }
            }
        });

        JButton crearTareaButton = new JButton("Crear Tarea");
        crearTareaButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    String descripcion = descripcionField.getText();
                    String estado = (String) estadoBox.getSelectedItem();
                    Date fechaEntrega = Date.valueOf(fechaEntregaField.getText());
                    String materia = (String) materiaBox.getSelectedItem();
                    
                    if (descripcion.isEmpty() || fechaEntrega == null || estado == null || materia.isEmpty()) {
                        JOptionPane.showMessageDialog(null, "Por favor, rellena todos los campos.");
                        return;
                    }
                    
                    Tarea nuevaTarea = new Tarea(descripcion, estado, fechaEntrega, materia);
                    boolean exito = tareaDAO.crearTarea(nuevaTarea);
                    if (exito) {
                    JOptionPane.showMessageDialog(null, "Tarea creada exitosamente");
                    } else {
                        JOptionPane.showMessageDialog(null, "Error al crear la tarea");
                    }
                } catch (IllegalArgumentException ex) {
                    JOptionPane.showMessageDialog(null, "Error: Fecha de entrega no es válida (formato: YYYY-MM-DD).");
                    ex.printStackTrace();
                } catch (Exception ex) {
                    JOptionPane.showMessageDialog(null, "Error inesperado al crear la tarea.");
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

        panel.add(new JLabel("Descripción:"));
        panel.add(descripcionField);
        panel.add(new JLabel("Estado:"));
        panel.add(estadoBox);
        panel.add(new JLabel("Fecha de Entrega (YYYY-MM-DD):"));
        panel.add(fechaEntregaField);
        panel.add(new JLabel("Materia:"));
        panel.add(materiaBox);
        panel.add(new JLabel("Nueva Materia:"));
        panel.add(nuevaMateriaField);
        panel.add(agregarMateriaButton);
        panel.add(crearTareaButton);
        panel.add(loginButton);

        add(panel);
    }
}