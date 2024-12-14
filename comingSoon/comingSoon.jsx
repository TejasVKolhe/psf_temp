import React, { useState, useEffect } from 'react';
import logo from './PSF25_white.png';
const PuneStartupFestCountdown = () => {
  const [timeLeft, setTimeLeft] = useState({
    days: '00',
    hours: '00',
    minutes: '00',
    seconds: '00'
  });

  useEffect(() => {
    const updateCountdown = () => {
      const targetDate = new Date("2025-01-11T00:00:00").getTime();
      const now = new Date().getTime();
      const difference = targetDate - now;

      const days = Math.floor(difference / (1000 * 60 * 60 * 24));
      const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((difference % (1000 * 60)) / 1000);

      setTimeLeft({
        days: days.toString().padStart(2, '0'),
        hours: hours.toString().padStart(2, '0'),
        minutes: minutes.toString().padStart(2, '0'),
        seconds: seconds.toString().padStart(2, '0')
      });
    };

    // Initial call
    updateCountdown();

    // Set up interval
    const intervalId = setInterval(updateCountdown, 1000);

    // Clean up interval on component unmount
    return () => clearInterval(intervalId);
  }, []);

  return (
    <div style={styles.container}>
      <div style={styles.content}>
        <header style={styles.header}>
          <div style={styles.logoContainer}>
            <img 
              src={logo} 
              alt="PSF Logo" 
              style={styles.logo}
            />
          </div>
        </header>
        <main style={styles.main}>
          <h1 style={styles.h1}>Pune Startup Fest</h1>
          <h2 style={styles.h2}>Coming Soon</h2>
          <div style={styles.countdown}>
            {Object.entries(timeLeft).map(([key, value]) => (
              <div key={key} style={styles.countdownItem}>
                <span style={styles.countdownValue}>{value}</span>
                <span style={styles.countdownLabel}>{key.charAt(0).toUpperCase() + key.slice(1)}</span>
              </div>
            ))}
          </div>
          <p style={styles.paragraph}>
            Get ready for an extraordinary journey into the world of startups and innovation!
          </p>
        </main>
        <footer style={styles.footer}>
          <div style={styles.socialIcons}>
            {['facebook-f', 'twitter', 'instagram', 'linkedin-in'].map(icon => (
              <a 
                key={icon} 
                href="#" 
                style={styles.socialIcon} 
                aria-label={icon}
              >
                <i className={`fab fa-${icon}`}></i>
              </a>
            ))}
          </div>
        </footer>
      </div>
      
      {/* Falling elements */}
      <div style={styles.fallingElementBefore}></div>
      <div style={styles.fallingElementAfter}></div>
    </div>
  );
};

// Styles converted from CSS to JavaScript
const styles = {
  container: {
    position: 'fixed',
    top: 0,
    left: 0,
    width: '100%',
    height: '100%',
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    background: 'linear-gradient(135deg, #00012E, #023062)',
    color: '#E2E2B6',
    overflow: 'hidden',
    fontFamily: "'Orbitron', sans-serif"
  },
  content: {
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    justifyContent: 'center',
    textAlign: 'center',
    zIndex: 2,
    width: '100%',
    maxWidth: '800px',
    padding: '2rem'
  },
  header: {
    width: '100%',
    marginBottom: '2rem',
    display: 'flex',
    justifyContent: 'center'
  },
  logoContainer: {
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center'
  },
  logo: {
    maxWidth: '200px',
    filter: 'drop-shadow(0 0 5px #0995CF)' // Reduced blur radius from 10px to 5px
  },
  main: {
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    width: '100%'
  },
  h1: {
    fontSize: '3rem',
    marginBottom: '1rem',
    textShadow: '0 0 10px #0995CF',
    textAlign: 'center'
  },
  h2: {
    fontSize: '2rem',
    marginBottom: '2rem',
    color: '#6EACDA',
    textAlign: 'center'
  },
  countdown: {
    display: 'flex',
    justifyContent: 'center',
    gap: '2rem',
    marginBottom: '2rem',
    flexWrap: 'wrap'
  },
  countdownItem: {
    background: 'rgba(2, 48, 98, 0.8)',
    padding: '1rem',
    borderRadius: '10px',
    minWidth: '100px',
    boxShadow: '0 0 20px rgba(9, 149, 207, 0.3)',
    margin: '0.5rem'
  },
  countdownValue: {
    display: 'block',
    fontSize: '2.5rem',
    fontWeight: 'bold'
  },
  countdownLabel: {
    display: 'block'
  },
  paragraph: {
    fontSize: '1.2rem',
    maxWidth: '600px',
    margin: '0 auto',
    textAlign: 'center'
  },
  footer: {
    width: '100%',
    marginTop: '2rem'
  },
  socialIcons: {
    display: 'flex',
    justifyContent: 'center',
    gap: '1rem'
  },
  socialIcon: {
    color: '#E2E2B6',
    textDecoration: 'none',
    fontSize: '1.5rem',
    transition: 'color 0.3s ease',
    ':hover': {
      color: '#6EACDA'
    }
  },
  fallingElementBefore: {
    position: 'absolute',
    width: '200px',
    height: '200px',
    background: 'linear-gradient(45deg, transparent, #0995CF, transparent)',
    animation: 'fall 15s linear infinite',
    opacity: 0.1,
    top: '-100px',
    left: '-100px'
  },
  fallingElementAfter: {
    position: 'absolute',
    width: '200px',
    height: '200px',
    background: 'linear-gradient(45deg, transparent, #0995CF, transparent)',
    animation: 'fall 15s linear infinite',
    animationDelay: '-7.5s',
    opacity: 0.1,
    bottom: '-100px',
    right: '-100px'
  }
};

// Keyframe animations (note: these would typically be added via CSS-in-JS library)
const keyframes = `
@keyframes fall {
  0% {
    transform: translateY(-100%) rotate(45deg);
  }
  100% {
    transform: translateY(100vh) rotate(45deg);
  }
}

@keyframes shine {
  0% {
    transform: translateX(-100%) rotate(45deg);
  }
  100% {
    transform: translateX(100%) rotate(45deg);
  }
}
`;

// Inject keyframes styles
const styleSheet = document.createElement("style")
styleSheet.type = "text/css"
styleSheet.innerText = keyframes
document.head.appendChild(styleSheet);

export default PuneStartupFestCountdown;