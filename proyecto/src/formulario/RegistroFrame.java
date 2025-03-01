package formulario;

import java.awt.GridLayout;
import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

public class RegistroFrame extends JFrame {
    private JComboBox<String> rolBox;
    private JTextField userField;
    private JPasswordField passField;

    public RegistroFrame() {
        setTitle("Registro");
        setSize(250, 150);
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

        JButton registerButton = new JButton("Registrar");
        registerButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String usuario = userField.getText();
                String contraseña = new String(passField.getPassword());
                String rol = rolBox.getSelectedItem().toString();
                registrarUsuario(usuario, contraseña, rol);
            }
        });
        JButton loginButton = new JButton("Iniciar Sesion");
        loginButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                LoginFrame LoginFrame = new LoginFrame();
                LoginFrame.setVisible(true);
                dispose();
            }
        });

        panel.add(userLabel);
        panel.add(userField);
        panel.add(passLabel);
        panel.add(passField);
        panel.add(rolLabel);
        panel.add(rolBox);
        panel.add(registerButton);
        panel.add(loginButton);
        add(panel);
    }

    private void registrarUsuario(String usuario, String contraseña, String rol) {
        try {
            Connection conn = conectarBaseDatos();
            String query = "INSERT INTO usuarios (usuario, contraseña, rol) VALUES (?, ?, ?)";
            PreparedStatement pst = conn.prepareStatement(query);
            pst.setString(1, usuario);
            pst.setString(2, contraseña);
            pst.setString(3, rol);
            pst.executeUpdate();
            JOptionPane.showMessageDialog(null, "Registro exitoso");
        } catch (Exception e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(null, "Registro fallido");
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