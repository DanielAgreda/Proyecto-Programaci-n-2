package formulario;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class TareaDAO {
    // Método de conexión a la base de datos
    private Connection conectarBaseDatos() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            return DriverManager.getConnection("jdbc:mysql://localhost:3306/proyecto", "root", "");
        } catch (Exception e) {
            e.printStackTrace();
            return null;
        }
    }

    // Método para crear una tarea
    public boolean crearTarea(Tarea tarea) {
        try {
            Connection conn = conectarBaseDatos();
            String query = "INSERT INTO tareas (descripcion, estado, fecha_entrega, materia) VALUES (?, ?, ?, ?)";
            PreparedStatement pst = conn.prepareStatement(query);
            pst.setString(1, tarea.getDescripcion());
            pst.setString(2, tarea.getEstado());
            pst.setDate(3, new java.sql.Date(tarea.getFechaEntrega().getTime()));
            pst.setString(4, tarea.getMateria());
            int filasInsertadas = pst.executeUpdate();
            return filasInsertadas > 0;
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }

    // Método para obtener las tareas
    public List<Tarea> obtenerTareas() {
        List<Tarea> tareas = new ArrayList<>();
        try {
            Connection conn = conectarBaseDatos();
            String query = "SELECT * FROM tareas";
            PreparedStatement pst = conn.prepareStatement(query);
            ResultSet rs = pst.executeQuery();
            while (rs.next()) {
                String descripcion = rs.getString("descripcion");
                String estado = rs.getString("estado");
                Date fechaEntrega = rs.getDate("fecha_entrega");
                String materia = rs.getString("materia");
                Tarea tarea = new Tarea(descripcion, estado, fechaEntrega, materia);
                tareas.add(tarea);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return tareas;
    }
}