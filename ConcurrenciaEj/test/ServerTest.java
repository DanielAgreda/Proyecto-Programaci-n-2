import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

public class ServerTest {

    @Test
    void testSingletonInstance() {
        
        Server instance1 = Server.getInstance();
        Server instance2 = Server.getInstance();
        
        assertNotNull(instance1, "La instancia del servidor no debería ser nula.");
        assertSame(instance1, instance2, "Ambas referencias deberían apuntar a la misma instancia.");
    }
}
