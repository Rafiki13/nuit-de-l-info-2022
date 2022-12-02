using UnityEngine;
using TMPro;

namespace NDIGame
{

    /// <summary>
    /// Damage pop-up UI component used to show damages done on a target.
    /// </summary>
    [RequireComponent(typeof(RectTransform))]
    public class Popup : MonoBehaviour
    {

        private RectTransform rectTransform; // The pop-up's RectTransform component.
        private TMP_Text text; // The pop-up's Text component (from TextMeshPro).
        
        private Vector2 offset; // The position to add to the pop-up during the fading animation.

        private float standStillTime; // The amount of time where the pop-up stands still.
        private float maxHeight; // The maximum height the pop-up will reach during its fading animation.
        private float lifetime; // The pop-up's total lifetime.
        private float fadeTime; // The pop-up's fading duration.
        private float timer; // The pop-up's life timer.
        private float a; // The function's x² coefficient for the pop-up's position during animation.

        private bool init; // The pop-up's initialisation state.

        private void Awake()
        {
            // Gets the required components from the game object.
            rectTransform = GetComponent<RectTransform>();
            text = GetComponent<TMP_Text>();
        }

        private void Start()
        {
            // If the pop-up has not been initialised on instantiation with Init, destroys the game object to avoid technical issues.
            if(!init)
            {
                Debug.LogWarning("Popup hasn't been initialized with " + nameof(Init) + ". Popup has been destroyed.");
                Destroy(gameObject);
            }
            
        }

        private void LateUpdate()
        {
            // Destroys the game object if the pop-ups lifetime has been reached.
            if(timer >= lifetime)
            {
                Destroy(gameObject);
                return;
            }

            offset = Vector2.zero;

            // Calculates the pop-up's offset position only if the timer has already reached its stand still duration.
            if(timer > standStillTime)
            {
                float fadeTimer = timer - standStillTime;
                text.alpha = 1f - Mathf.Clamp(fadeTimer / fadeTime, 0f, 1f);
                offset.y = a * fadeTimer * fadeTimer;
            }

            if(offset.y > maxHeight)
            {
                Debug.LogWarning("Value exceeded! Max was " + maxHeight + ", but calculated a height of " + offset.y);
            }

            rectTransform.localPosition = offset;
            timer += Time.deltaTime;
        }

        public void Init(float lifetime, float maxHeight, float standStillTime)
        {
            this.lifetime = lifetime;
            this.maxHeight = maxHeight;
            this.standStillTime = standStillTime;

            fadeTime = lifetime - standStillTime;

            if(fadeTime <= 0)
            {
                throw new System.ArgumentException("Stand still time equals or exceeds the pop-up's lifetime.");
            }

            a = maxHeight / Mathf.Pow(fadeTime, 2);
            
            init = true;
        }

        public string Text
        {
            get => text.text;
            set { text.text = value; }
        }

    }

}