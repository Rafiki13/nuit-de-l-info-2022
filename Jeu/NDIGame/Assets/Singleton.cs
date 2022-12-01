using UnityEngine;

namespace NDIGame
{

    /// <summary>
    /// Component class acting as a singleton and containing a static instance of a specific component.
    /// </summary>
    /// <typeparam name="C">Any component that must be declared as singleton (Must inherit from Singleton itself).</typeparam>
    public class Singleton<C> : MonoBehaviour where C : Singleton<C>
    {

        private static C instance; // The singleton's current static instance.

        [SerializeField] private bool indestructible = true; // The singleton's indestructible state.

        protected void Awake()
        {
            // Calls OnInstantiate each time a new instance of this component is created.
            OnInstantiate();

            // If an instance of this component is already defined, destroys this copy and calls OnCopyDestroy.
            if (instance)
            {
                OnCopyDestroy();
                Destroy(gameObject);
                return;
            }

            // Else, calls OnSingletonLoad, sets the object as Indestructible if enabled and defines the instance to this component.
            OnSingletonLoad();

            if (indestructible)
            {
                DontDestroyOnLoad(gameObject);
            }
            instance = (C) this;
        }
        
        protected void OnDestroy()
        {
            if (instance == this)
            {
                instance = null;
            }

        }

        /// <summary>
        /// The singleton's static instance.
        /// </summary>
        public static C Instance => instance;

        /// <summary>
        /// Callback function called when a new instance of this singleton has been created.
        /// </summary>
        protected virtual void OnInstantiate() {}
        /// <summary>
        /// Callback function called when the singleton loads. This function is a replacement to the Awake function,
        /// which is already used by the singleton base to manage itself.
        /// </summary>
        protected virtual void OnSingletonLoad() {}
        /// <summary>
        /// Callback function called when a copy of this singleton is destroyed on load.
        /// </summary>
        protected virtual void OnCopyDestroy(){}

    }

}
