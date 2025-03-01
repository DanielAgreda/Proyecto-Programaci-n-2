package formulario;

import java.util.Date;

public class Tarea {
    private String descripcion;
    private String estado;
    private Date fechaEntrega;
    private String materia;

    public Tarea(String descripcion, String estado, Date fechaEntrega, String materia) {
        this.descripcion = descripcion;
        this.estado = estado;
        this.fechaEntrega = fechaEntrega;
        this.materia = materia;
    }

    // Getters y setters
    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public Date getFechaEntrega() {
        return fechaEntrega;
    }

    public void setFechaEntrega(Date fechaEntrega) {
        this.fechaEntrega = fechaEntrega;
    }

    public String getMateria() {
        return materia;
    }

    public void setMateria(String materia) {
        this.materia = materia;
    }

    @Override
    public String toString() {
        return "Tarea: " + descripcion + ", Estado: " + estado + ", Fecha de Entrega: " + fechaEntrega + ", Materia: " + materia;
    }
}