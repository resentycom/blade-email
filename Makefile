.PHONY: serve install update clean help

# Default target
help:
	@echo "Available commands:"
	@echo "  make serve    - Start the playground development server"
	@echo "  make install  - Install playground dependencies"
	@echo "  make update   - Update playground dependencies"
	@echo "  make clean    - Clean playground cache and logs"
	@echo "  make help     - Show this help message"

# Start the playground development server
serve:
	@echo "Starting playground server..."
	cd playground && php artisan serve

# Install playground dependencies
install:
	@echo "Installing playground dependencies..."
	cd playground && composer install

# Update playground dependencies
update:
	@echo "Updating playground dependencies..."
	cd playground && composer update

# Clean playground cache and logs
clean:
	@echo "Cleaning playground cache and logs..."
	cd playground && php artisan cache:clear
	cd playground && php artisan config:clear
	cd playground && php artisan view:clear
	cd playground && rm -f storage/logs/*.log