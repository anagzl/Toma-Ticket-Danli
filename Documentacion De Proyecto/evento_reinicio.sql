-- Evento para reiniciar los tickets a diario

CREATE DEFINER=`root`@`localhost` EVENT `ticket_reset` ON SCHEDULE EVERY 1 DAY STARTS '2022-07-08 18:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
CALL reiniciar_tickets;
END