


console.log("Hello world!");

const myName = "Mohamed Yusuf";
const h1 = document.querySelector(".heading-primary");
console.log(myName);
console.log(h1);

// h1.addEventListener("click", function () {
//   h1.textContent = myName;
//   h1.style.backgroundColor = "red";
//   h1.style.padding = "5rem";
// });

///////////////////////////////////////////////////////////
//Set current year
//const yearEl = document.querySelector(".year");
//const currentYear = new Date().getFullYear();
//yearEl.textContent = currentYear;

///////////////////////////////////////////////////////////

//Quiz



//Make The Conditioning page work


var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}



function updateProgressBar(section, progress) {
    const progressBar = document.getElementById(`progress-bar-${section}`);
    if (progressBar) {
        progressBar.style.width = `${progress}%`;
    } else {
        console.warn(`Progress bar element not found for section "${section}"`);
    }
}

function initializeProgressBar() {
    const currentPage = window.location.href;
    const { section } = getCurrentSectionAndIndex(currentPage);

    if (section) {
        const progress = localStorage.getItem(`${section}-progress`);

        // Update progress bar with stored progress
        if (progress) {
            updateProgressBar(section, progress);
        }
    }

    localStorage.removeItem('pageCompleted');
}

const sections = {
    'test': ['test1.php', 'test2.php', 'test3.php', 'test4.php', 'test5.php', 'test6.php', 'test7.php', 'test8.php'],
    'firstshooting': ['firstshooting1.php', 'firstshooting2.php', 'firstshooting3.php', 'firstshooting4.php', 'firstshooting5.php'],
    'handles': ['handles1.php', 'handles2.php', 'handles3.php', 'handles4.php', 'handles5.php', 'handles6.php', 'handles7.php']
};

function getCurrentSectionAndIndex(currentPage) {
    for (const section in sections) {
        const index = sections[section].findIndex(page => currentPage.includes(page));
        if (index !== -1) {
            return { section, index };
        }
    }
    return { section: null, index: -1 };
}

function markPageAsCompleted() {
    const isCompleted = localStorage.getItem('pageCompleted');

    if (isCompleted === null) {
        const currentPage = window.location.href;
        const { section, index } = getCurrentSectionAndIndex(currentPage);

        if (section !== null && index !== -1) {
            const isPageCompleted = localStorage.getItem(`${section}${index}Completed`);

            if (isPageCompleted === null) {
                const storedProgress = localStorage.getItem(`${section}-progress`) || 0;
                const updatedProgress = Number(storedProgress) + 100 / sections[section].length;
                localStorage.setItem(`${section}-progress`, updatedProgress);
                updateProgressBar(section, updatedProgress);
                localStorage.setItem(`${section}${index}Completed`, 'true');
                localStorage.setItem('pageCompleted', 'true');

                const nextPageIndex = index + 1;
                if (nextPageIndex < sections[section].length) {
                    location.href = sections[section][nextPageIndex];
                } else {
                    console.log(`All pages completed for section "${section}"!`);
                }
            } else {
                console.log(`Page ${section}${index} already marked as completed!`);
            }
        }
    } else {
        const currentPage = window.location.href;
        const { section, index } = getCurrentSectionAndIndex(currentPage);
        const nextPageIndex = index + 1;

        if (nextPageIndex < sections[section].length) {
            location.href = sections[section][nextPageIndex];
        } else {
            console.log(`All pages completed for section "${section}"!`);
        }
    }
}


// Function to reset progress
function resetProgress() {
    for (const section in sections) {
        localStorage.removeItem(`${section}-progress`);
        localStorage.removeItem('pageCompleted');
        for (let i = 0; i < sections[section].length; i++) {
            localStorage.removeItem(`${section}${i}Completed`);
        }
    }

    location.href = sections.test[0];
}

// Add this line to run the initializeProgressBar function on page load
window.onload = initializeProgressBar;



///////

////////////////////////////////////
//Quiz



// Make mobile navigation work

document.addEventListener("DOMContentLoaded", function () {
    const btnNavEl = document.querySelector(".btn-mobile-nav");
    const headerEl = document.querySelector(".header");

    btnNavEl.addEventListener("click", function () {
        headerEl.classList.toggle("nav-open");
    });
});
///////////////////////////////////////////////////////////
// Smooth scrolling animation

const allLinks = document.querySelectorAll("a:link");

allLinks.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const href = link.getAttribute("href");

    // Scroll back to top
    if (href === "#")
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });

    
    if (href !== "#" && href.startsWith("#")) {
      const sectionEl = document.querySelector(href);
      sectionEl.scrollIntoView({ behavior: "smooth" });
    }

    // Close mobile naviagtion
    if (link.classList.contains("main-nav-link"))
      headerEl.classList.toggle("nav-open");
  });
});




// End of Progress Bar







/////////////////////// Video Analysis


//////////////////////



///////////////////////////////////////////////////////////
// Sticky navigation

const sectionHeroEl = document.querySelector(".section-hero");

const obs = new IntersectionObserver(
  function (entries) {
    const ent = entries[0];
    console.log(ent);

    if (ent.isIntersecting === false) {
      document.body.classList.add("sticky");
    }

    if (ent.isIntersecting === true) {
      document.body.classList.remove("sticky");
    }
  },
  {
    
    root: null,
    threshold: 0,
    rootMargin: "-80px",
  }
);
obs.observe(sectionHeroEl);





const aboutMeText = document.querySelector(".about-me-text");
const aboutMeTextContent = "Workouts";

Array.from(aboutMeTextContent).forEach((char) => {
    const span = document.createElement("span");
    span.textContent = char;
    aboutMeText.appendChild(span);

    span.addEventListener("mouseenter", (e) => {
        e.target.style.animation = "aboutMeTextAnim 10s infinite";
    });
});




///////////////////////////////////////////////////////////
// Fixing flexbox gap property missing in some Safari versions
function checkFlexGap() {
  var flex = document.createElement("div");
  flex.style.display = "flex";
  flex.style.flexDirection = "column";
  flex.style.rowGap = "1px";

  flex.appendChild(document.createElement("div"));
  flex.appendChild(document.createElement("div"));

  document.body.appendChild(flex);
  var isSupported = flex.scrollHeight === 1;
  flex.parentNode.removeChild(flex);
  console.log(isSupported);

  if (!isSupported) document.body.classList.add("no-flexbox-gap");
}
checkFlexGap();



///////////////////////


/* https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js */

/*
.no-flexbox-gap .main-nav-list li:not(:last-child) {
  margin-right: 4.8rem;
}

.no-flexbox-gap .list-item:not(:last-child) {
  margin-bottom: 1.6rem;
}

.no-flexbox-gap .list-icon:not(:last-child) {
  margin-right: 1.6rem;
}

.no-flexbox-gap .delivered-faces {
  margin-right: 1.6rem;
}

.no-flexbox-gap .workout-attribute:not(:last-child) {
  margin-bottom: 2rem;
}

.no-flexbox-gap .workout-icon {
  margin-right: 1.6rem;
}

.no-flexbox-gap .footer-row div:not(:last-child) {
  margin-right: 6.4rem;
}

.no-flexbox-gap .social-links li:not(:last-child) {
  margin-right: 2.4rem;
}

.no-flexbox-gap .footer-nav li:not(:last-child) {
  margin-bottom: 2.4rem;
}

@media (max-width: 75em) {
  .no-flexbox-gap .main-nav-list li:not(:last-child) {
    margin-right: 3.2rem;
  }
}

@media (max-width: 59em) {
  .no-flexbox-gap .main-nav-list li:not(:last-child) {
    margin-right: 0;
    margin-bottom: 4.8rem;
  }
}
*/





