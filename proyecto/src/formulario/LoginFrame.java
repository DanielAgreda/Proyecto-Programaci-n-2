package formulario;

import java.awt.GridLayout;
import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class LoginFrame extends JFrame {
    private JComboBox<String> rolBox;
    private JTextField userField;
    private JPasswordField passField;

    public LoginFrame() {
        setTitle("Login");
        setSize(275, 150);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        JPanel panel = new JPanel();
        panel.setLayout(new GridLayout(4, 2));

        JLabel userLabel = new JLabel("Usuario:");
        userField = new JTextField();
        JLabel passLabel = new JLabel("Contraseña:");
        passField = new JPasswordField();
        JLabel rolLabel = new JLabel("Rol:");
        rolBox = new JComboBox<>(new String[]{"profesor", "alumno"});

        JButton loginButton = new JButton("Iniciar Sesión");
        loginButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String usuario = userField.getText();
                String contraseña = new String(passField.getPassword());
                String rol = rolBox.getSelectedItem().toString();
                if (validarLogin(usuario, contraseña, rol)) {
                    JOptionPane.showMessageDialog(null, "Login exitoso");
                    
                    if(rol.equals("profesor")){
                        DocenteFrame docenteFrame = new DocenteFrame();
                        docenteFrame.setVisible(true);
                        dispose();
                
                    } else {
                        EstudianteFrame estudianteFrame = new EstudianteFrame();
                        estudianteFrame.setVisible(true);
                        dispose();
                    }
                    
                } else {
                    JOptionPane.showMessageDialog(null, "Login fallido");
                }
            }
        });

        JButton registerButton = new JButton("Registrar");
        registerButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                RegistroFrame registroFrame = new RegistroFrame();
                registroFrame.setVisible(true);
                dispose();
            }
        });

        panel.add(userLabel);
        panel.add(userField);
        panel.add(passLabel);
        panel.add(passField);
        panel.add(rolLabel);
        panel.add(rolBox);
        panel.add(loginButton);
        panel.add(registerButton);

        add(panel);
    }

    private boolean validarLogin(String usuario, String contraseña, String rol) {
        try {
            Connection conn = conectarBaseDatos();
            String query1 = "SELECT * FROM usuarios WHERE rol = ?";
            String query = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ? AND rol = ?";
            PreparedStatement pst = conn.prepareStatement(query);
            pst.setString(1, usuario);
            pst.setString(2, contraseña);
            pst.setString(3, rol);
            ResultSet rs = pst.executeQuery();
            return rs.next();
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }

    private Connection conectarBaseDatos() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            return DriverManager.getConnection("jdbc:mysql://localhost:3306/proyecto", "root", "");
        } catch (Exception e) {
            e.printStackTrace();
            return null;
        }
    }
}